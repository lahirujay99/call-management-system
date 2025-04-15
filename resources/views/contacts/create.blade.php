<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-md mx-auto max-w-2xl my-6">

        <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Contact</h2>
        <hr class="border-b border-gray-200 mb-6">

        <!-- Added enctype attribute for file uploads -->
        <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6" autocomplete="off" enctype="multipart/form-data">
            @csrf

            <h3 class="text-lg font-medium text-gray-700 mb-4">Personal Details</h3>

            {{-- Title Dropdown Input Row --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="title"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Title
                </label>
                <div class="md:border-l md:border-gray-300">
                    <select id="title" name="title" required
                            class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none">
                        <option value="" disabled selected>Select Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Ms">Ms</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                </div>
            </div>

            {{-- First Name Input Row --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="first_name"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    First Name
                </label>
                <div class="md:border-l md:border-gray-300">
                    <input type="text" id="first_name" name="first_name" required
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none"
                           onpaste="return false;">
                </div>
            </div>

            {{-- Last Name Input Row --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="last_name"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Last Name
                </label>
                <div class="md:border-l md:border-gray-300">
                    <input type="text" id="last_name" name="last_name" required
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none"
                           onpaste="return false;">
                </div>
            </div>

            {{-- Designation Dropdown Input Row --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="designation_id"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Designation
                </label>
                <div class="md:border-l md:border-gray-300">
                    <select id="designation_id" name="designation_id" required
                            class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none">
                        <option value="" disabled selected>Select Designation</option>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="branch_id"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Branch
                </label>
                <div class="md:border-l md:border-gray-300">
                    <select id="branch_id" name="branch_id" required
                            class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none">
                        <option value="" disabled selected>Select Branch</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Extension Code Input Row --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="extension_code"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Extension Code
                </label>
                <div class="md:border-l md:border-gray-300">
                    <input type="text" id="extension_code" name="extension_code"
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none"
                           onpaste="return false;">
                </div>
            </div>

            {{-- Personal Mobile Input Row (Primary) --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="personal_mobile"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Personal Mobile (Primary) *
                </label>
                <div class="md:border-l md:border-gray-300">
                    <input type="text" id="personal_mobile" name="personal_mobile" required
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none"
                           onpaste="return false;">
                </div>
            </div>

            {{-- Personal Mobile 2 Input Row --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="personal_mobile_2"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Personal Mobile 2 (Optional)
                </label>
                <div class="md:border-l md:border-gray-300">
                    <input type="text" id="personal_mobile_2" name="personal_mobile_2"
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none"
                           onpaste="return false;">
                </div>
            </div>

            {{-- Personal Mobile 3 Input Row --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="personal_mobile_3"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Personal Mobile 3 (Optional)
                </label>
                <div class="md:border-l md:border-gray-300">
                    <input type="text" id="personal_mobile_3" name="personal_mobile_3"
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none"
                           onpaste="return false;">
                </div>
            </div>

            {{-- Contact Image Upload Field --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="contact_image"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Contact Image
                </label>
                <div class="md:border-l md:border-gray-300">
                    <input type="file" id="contact_image" name="contact_image" accept="image/*"
                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none">
                    <p class="text-xs text-gray-500 mt-1">Upload an image (JPEG, PNG, JPG, GIF). Max size: 2MB</p>
                </div>
            </div>

            {{-- Preview Image Container --}}
            <div id="imagePreviewContainer" class="hidden mt-4 text-center">
                <h4 class="text-sm text-gray-600 mb-2">Image Preview</h4>
                <img id="imagePreview" src="#" alt="Preview" class="mx-auto h-32 w-32 object-cover rounded-full border border-gray-300">
                <button type="button" id="removeImage" class="mt-2 text-red-500 text-sm underline">Remove Image</button>
            </div>

            {{-- Active Status Input Row --}}
            <div class="grid md:grid-cols-[1fr_4fr] md:gap-4 border border-gray-300 rounded-md">
                <label for="active_status"
                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                    Active Status
                </label>
                <div class="md:border-l md:border-gray-300">
                    <select id="active_status" name="active_status" required
                            class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none md:rounded-r-md rounded-md bg-white focus:outline-none">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const contactForm = document.querySelector('form');
            const titleDropdown = document.getElementById('title');
            const firstNameInput = document.getElementById('first_name');
            const lastNameInput = document.getElementById('last_name');
            const personalMobileInput = document.getElementById('personal_mobile');
            const personalMobile2Input = document.getElementById('personal_mobile_2');
            const personalMobile3Input = document.getElementById('personal_mobile_3');
            const extensionCodeInput = document.getElementById('extension_code');
            const designationDropdown = document.getElementById('designation_id');
            const branchDropdown = document.getElementById('branch_id');
            const activeStatusDropdown = document.getElementById('active_status');
            const contactImageInput = document.getElementById('contact_image');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imagePreview = document.getElementById('imagePreview');
            const removeImageBtn = document.getElementById('removeImage');

            // Array of input elements where pasting should be disabled
            const noPasteInputs = [firstNameInput, lastNameInput, extensionCodeInput, personalMobileInput, personalMobile2Input, personalMobile3Input];

            // Loop through each input and add event listener
            noPasteInputs.forEach(inputElement => {
                inputElement.addEventListener('paste', function(event) {
                    event.preventDefault();
                    alert('Pasting is disabled in this field.');
                });
            });

            // --- Validation Functions ---
            function isValidExtension(extension) {
                return /^[0-9]+$/.test(extension);
            }

            function isValidMobile(mobile) {
                const mobileRegex = /^[0-9]+$/;
                return mobileRegex.test(mobile) && mobile.length >= 10 && mobile.length <= 12;
            }

            function isValidName(name) {
                return /^[a-zA-Z\s]+$/.test(name);
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

                if (!/^[0-9]+$/.test(char)) { // Prevent non-digit input
                    event.preventDefault();
                } else if (this.value.length >= 12) { // Prevent input beyond 12 digits
                    event.preventDefault();
                }
            });

            personalMobile2Input.addEventListener('keypress', function(event) {
                const char = String.fromCharCode(event.charCode);
                const newValue = this.value + char;

                if (!/^[0-9]+$/.test(char)) { // Prevent non-digit input
                    event.preventDefault();
                } else if (this.value.length >= 12) { // Prevent input beyond 12 digits
                    event.preventDefault();
                }
            });

            personalMobile3Input.addEventListener('keypress', function(event) {
                const char = String.fromCharCode(event.charCode);
                const newValue = this.value + char;

                if (!/^[0-9]+$/.test(char)) { // Prevent non-digit input
                    event.preventDefault();
                } else if (this.value.length >= 12) { // Prevent input beyond 12 digits
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
                    displayError(this, 'Only letters and spaces are allowed.');
                } else {
                    clearError(this);
                }
            });

            lastNameInput.addEventListener('input', function() {
                if (!isValidName(this.value)) {
                    displayError(this, 'Only letters and spaces are allowed.');
                } else {
                    clearError(this);
                }
            });

            personalMobileInput.addEventListener('input', function() {
                const mobileValue = this.value; // Get current input value

                if (mobileValue.length < 10 && mobileValue.length > 0) { // Check if less than 10 AND not empty
                    displayError(this, 'Personal mobile number must be between 10 and 12 digits.'); // Show warning
                } else if (!isValidMobile(mobileValue) && mobileValue.length > 0) { // If not valid after 10 digits, show full error
                    displayError(this, 'Personal mobile number must be 10 to 12 digits and contain only numbers.');
                }
                else {
                    clearError(this); // Clear error when valid or empty
                }
            });

            personalMobile2Input.addEventListener('input', function() {
                const mobileValue = this.value;

                if (mobileValue.length > 0 && (mobileValue.length < 10 || !isValidMobile(mobileValue))) {
                    displayError(this, 'Mobile number must be between 10 and 12 digits and contain only numbers.');
                } else {
                    clearError(this);
                }
            });

            personalMobile3Input.addEventListener('input', function() {
                const mobileValue = this.value;

                if (mobileValue.length > 0 && (mobileValue.length < 10 || !isValidMobile(mobileValue))) {
                    displayError(this, 'Mobile number must be between 10 and 12 digits and contain only numbers.');
                } else {
                    clearError(this);
                }
            });

            extensionCodeInput.addEventListener('input', function() {
                if (!isValidExtension(this.value)) {
                    displayError(this, 'Only numbers are allowed in extension code.');
                } else {
                    clearError(this);
                }
            });

            // --- Image Upload Preview ---
            if (contactImageInput) {
                contactImageInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const fileSize = this.files[0].size / 1024 / 1024; // in MB
                        const fileType = this.files[0].type;

                        // Check file size
                        if (fileSize > 2) {
                            Swal.fire({
                                icon: 'error',
                                title: 'File too large',
                                text: 'File size exceeds 2MB. Please choose a smaller file.',
                            });
                            this.value = ''; // Clear the input
                            imagePreviewContainer.classList.add('hidden');
                            return;
                        }

                        // Check file type
                        if (!fileType.match('image.*')) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid file type',
                                text: 'Please select an image file (JPEG, PNG, JPG, GIF).',
                            });
                            this.value = ''; // Clear the input
                            imagePreviewContainer.classList.add('hidden');
                            return;
                        }

                        // Show image preview
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreviewContainer.classList.remove('hidden');
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });

                // Remove image functionality
                if (removeImageBtn) {
                    removeImageBtn.addEventListener('click', function() {
                        contactImageInput.value = '';
                        imagePreviewContainer.classList.add('hidden');
                    });
                }
            }

            // --- Form Submission Validation ---
            contactForm.addEventListener('submit', function(event) {
                clearError(titleDropdown);
                clearError(firstNameInput);
                clearError(lastNameInput);
                clearError(personalMobileInput);
                clearError(personalMobile2Input);
                clearError(personalMobile3Input);
                clearError(extensionCodeInput);
                clearError(designationDropdown);
                clearError(branchDropdown);
                clearError(activeStatusDropdown);

                let hasErrors = false;

                const requiredFields = [
                    { input: titleDropdown, message: 'Title is required.' },
                    { input: firstNameInput, message: 'First name is required.' },
                    { input: lastNameInput, message: 'Last name is required.' },
                    { input: designationDropdown, message: 'Designation is required.' },
                    { input: branchDropdown, message: 'Branch is required.' },
                    { input: personalMobileInput, message: 'Primary personal mobile is required.' },
                    { input: activeStatusDropdown, message: 'Active status is required.' },
                ];

                requiredFields.forEach(field => {
                    if (!field.input.value || field.input.value.trim() === '' || field.input.value === null) {
                        displayError(field.input, field.message);
                        hasErrors = true;
                    }
                });

                if (!isValidName(firstNameInput.value) && firstNameInput.value.trim() !== '') {
                    displayError(firstNameInput, 'First name is invalid. Only letters and spaces are allowed.');
                    hasErrors = true;
                }
                if (!isValidName(lastNameInput.value)  && lastNameInput.value.trim() !== '') {
                    displayError(lastNameInput, 'Last name is invalid. Only letters and spaces are allowed.');
                    hasErrors = true;
                }
                if (!isValidMobile(personalMobileInput.value) && personalMobileInput.value.trim() !== '') {
                    displayError(personalMobileInput, 'Personal mobile number must have 10-12 digits and contain only numbers.');
                    hasErrors = true;
                }

                // Validate optional mobile numbers only if they have been entered
                const mobile2Value = personalMobile2Input.value.trim();
                if (mobile2Value !== '' && !isValidMobile(mobile2Value)) {
                    displayError(personalMobile2Input, 'Mobile number must be 10-12 digits and contain only numbers.');
                    hasErrors = true;
                }

                const mobile3Value = personalMobile3Input.value.trim();
                if (mobile3Value !== '' && !isValidMobile(mobile3Value)) {
                    displayError(personalMobile3Input, 'Mobile number must be 10-12 digits and contain only numbers.');
                    hasErrors = true;
                }

                if (!isValidExtension(extensionCodeInput.value) && extensionCodeInput.value.trim() !== '') {
                    displayError(extensionCodeInput, 'Extension code is invalid. Only numbers are allowed.');
                    hasErrors = true;
                }

                if (hasErrors) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please correct the errors in the form.',
                    });
                }
            });

            // --- SweetAlert2 for Success Message after Form Submission ---
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 2000,
            });
            @endif
        });
    </script>
</x-app-layout>
