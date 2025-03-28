<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-md mx-auto max-w-2xl my-6">


        <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Contact</h2>
        <hr class="border-b border-gray-200 mb-6">

        <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6">
            @csrf


            <h3 class="text-lg font-medium text-gray-700 mb-4">Personal Details</h3>

            {{-- First Name Input Row --}}
            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                <label for="first_name"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    First Name
                </label>
                <div class="border-l border-gray-300">
                    <input type="text" id="first_name" name="first_name"
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none rounded-r-md bg-white focus:outline-none">
                </div>
            </div>

            {{-- Last Name Input Row --}}
            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                <label for="last_name"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Last Name
                </label>
                <div class="border-l border-gray-300">
                    <input type="text" id="last_name" name="last_name"
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none rounded-r-md bg-white focus:outline-none">
                </div>
            </div>

            {{-- Designation Input Row --}}
            {{-- Designation Dropdown Input Row --}}
            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                <label for="designation_id"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Designation
                </label>
                <div class="border-l border-gray-300">
                    <select id="designation_id" name="designation_id"
                            class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none rounded-r-md bg-white focus:outline-none">
                        <option value="" disabled selected>Select Designation</option> {{-- Default option --}}
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                <label for="branch_id"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Branch
                </label>
                <div class="border-l border-gray-300">
                    <select id="branch_id" name="branch_id"
                            class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none rounded-r-md bg-white focus:outline-none">
                        <option value="" disabled selected>Select Branch</option> {{-- Default option --}}
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Extension Code Input Row --}}
            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                <label for="extension_code"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Extension Code
                </label>
                <div class="border-l border-gray-300">
                    <input type="text" id="extension_code" name="extension_code"
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none rounded-r-md bg-white focus:outline-none">
                </div>
            </div>

            {{-- Personal Mobile Input Row --}}
            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                <label for="personal_mobile"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Personal Mobile
                </label>
                <div class="border-l border-gray-300">
                    <input type="text" id="personal_mobile" name="personal_mobile"
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none rounded-r-md bg-white focus:outline-none">
                </div>
            </div>

            {{-- Active Status Input Row --}}
            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                <label for="active_status"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Active Status
                </label>
                <div class="border-l border-gray-300">
                    <select id="active_status" name="active_status"
                            class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none rounded-r-md bg-white focus:outline-none">
                        <option value="" disabled selected>Select Status</option>
                        <option value="active">Active</option>
                        <option value="disable temporally">Disable Temporally</option>
                    </select>
                </div>
            </div>

            {{-- Save Button --}}
            <div class="mt-6 w-2/5 mx-auto">
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-[#F9F7F7] bg-[#112D4E] hover:bg-[#3F72AF] w-full">
                    Save
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const contactForm = document.querySelector('form');
            const firstNameInput = document.getElementById('first_name');
            const lastNameInput = document.getElementById('last_name');
            const personalMobileInput = document.getElementById('personal_mobile');
            const extensionCodeInput = document.getElementById('extension_code');

            // --- Validation Functions (Updated isValidName) ---
            function isValidName(name) {
                return /^[a-zA-Z\s\-]+$/.test(name); // Removed apostrophe from regex
            }

            function isValidMobile(mobile) {
                return /^[0-9\+\- ]+$/.test(mobile);
            }

            function isValidExtension(extension) {
                return /^[a-zA-Z0-9\+\-\#\* ]*$/.test(extension);
            }

            function displayError(inputElement, errorMessage) {
                let errorSpan = inputElement.nextElementSibling;
                if (!errorSpan || !errorSpan.classList.contains('error-message')) {
                    errorSpan = document.createElement('span');
                    errorSpan.classList.add('error-message', 'text-red-500', 'text-sm', 'block', 'mt-1');
                    inputElement.parentNode.insertBefore(errorSpan, inputElement.nextSibling);
                }
                errorSpan.textContent = errorMessage;
                inputElement.classList.add('is-invalid');
            }

            function clearError(inputElement) {
                const errorSpan = inputElement.nextElementSibling;
                if (errorSpan && errorSpan.classList.contains('error-message')) {
                    errorSpan.remove();
                    inputElement.classList.remove('is-invalid');
                }
            }

            // --- Keypress Event Listeners for Input Restriction ---

            firstNameInput.addEventListener('keypress', function(event) {
                const char = String.fromCharCode(event.charCode);
                const newValue = this.value + char;
                if (!isValidName(newValue)) {
                    event.preventDefault();
                }
            });

            lastNameInput.addEventListener('keypress', function(event) {
                const char = String.fromCharCode(event.charCode);
                const newValue = this.value + char;
                if (!isValidName(newValue)) {
                    event.preventDefault();
                }
            });

            personalMobileInput.addEventListener('keypress', function(event) {
                const char = String.fromCharCode(event.charCode);
                const newValue = this.value + char;
                if (!isValidMobile(newValue)) {
                    event.preventDefault();
                }
            });

            extensionCodeInput.addEventListener('keypress', function(event) {
                const char = String.fromCharCode(event.charCode);
                const newValue = this.value + char;
                if (!isValidExtension(newValue)) {
                    event.preventDefault();
                }
            });


            // --- Input Event Listeners for Error Display ---
            firstNameInput.addEventListener('input', function() {
                if (!isValidName(this.value)) {
                    displayError(this, 'Only letters, spaces, and hyphens are allowed.');
                } else {
                    clearError(this);
                }
            });

            lastNameInput.addEventListener('input', function() {
                if (!isValidName(this.value)) {
                    displayError(this, 'Only letters, spaces, and hyphens are allowed.');
                } else {
                    clearError(this);
                }
            });

            personalMobileInput.addEventListener('input', function() {
                if (!isValidMobile(this.value)) {
                    displayError(this, 'Only digits, +, -, and spaces are allowed.');
                } else {
                    clearError(this);
                }
            });

            extensionCodeInput.addEventListener('input', function() {
                if (!isValidExtension(this.value)) {
                    displayError(this, 'Invalid characters in extension code.');
                } else {
                    clearError(this);
                }
            });


            // --- Form Submission Validation ---
            contactForm.addEventListener('submit', function(event) {
                clearError(firstNameInput);
                clearError(lastNameInput);
                clearError(personalMobileInput);
                clearError(extensionCodeInput);

                let hasErrors = false;

                if (!isValidName(firstNameInput.value)) {
                    displayError(firstNameInput, 'First name is invalid.');
                    hasErrors = true;
                }
                if (!isValidName(lastNameInput.value)) {
                    displayError(lastNameInput, 'Last name is invalid.');
                    hasErrors = true;
                }
                if (!isValidMobile(personalMobileInput.value)) {
                    displayError(personalMobileInput, 'Personal mobile is invalid.');
                    hasErrors = true;
                }
                if (!isValidExtension(extensionCodeInput.value)) {
                    displayError(extensionCodeInput, 'Extension code is invalid.');
                    hasErrors = true;
                }

                if (hasErrors) {
                    event.preventDefault();
                    alert('Please correct the errors in the form.');
                }
            });

            // --- Initial Validation on Page Load ---
            if (!isValidName(firstNameInput.value)) {
                displayError(firstNameInput, 'Invalid first name format.');
            }
            if (!isValidName(lastNameInput.value)) {
                displayError(lastNameInput, 'Invalid last name format.');
            }
            if (!isValidMobile(personalMobileInput.value)) {
                displayError(personalMobileInput, 'Invalid mobile number format.');
            }
            if (!isValidExtension(extensionCodeInput.value)) {
                displayError(extensionCodeInput, 'Invalid extension code format.');
            }

        });
    </script>
</x-app-layout>
