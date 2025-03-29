<x-app-layout>

    <div class="pb-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="bg-white p-4 rounded-lg shadow-md mx-auto max-w-2xl"> {{-- Main container for both form and table --}}

                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Designation Management</h2> {{-- Updated main heading --}}
                        <hr class="border-b border-gray-200 mb-6">


                        <div class="mb-8"> {{-- Container for the Add Designation Form with margin --}}
                            <h3 class="text-lg font-medium text-gray-700 mb-4">Add New Designation</h3>

                            <form action="{{ route('designation.store') }}" method="POST" id="addDesignationForm" class="space-y-6"
                                  autocomplete="off">
                                @csrf

                                {{-- Designation Name Input Row --}}
                                <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md">
                                    <label for="name"
                                           class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2">
                                        Designation Name
                                    </label>
                                    <div class="border-l border-gray-300">
                                        <input type="text" id="name" name="name"
                                               class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;">
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


                        <div> {{-- Container for Existing Designations and Search --}}
                            <h3 class="text-lg font-medium text-gray-700 mb-4">Existing Designations</h3>

                            <div class="mb-4">
                                <form action="{{ route('designation.index') }}" method="GET">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                 fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input type="search" id="default-search" name="search" value="{{ $search ?? '' }}"
                                               class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="Search Designation name..." autocomplete="off"
                                               onpaste="return false;">
                                    </div>
                                </form>
                            </div>


                            <div class="overflow-x-auto shadow-sm">
                                <table class="min-w-full divide-y divide-gray-200 table-auto">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created At
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($designations as $designation)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $designation->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $designation->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button data-designation-id="{{ $designation->id }}"
                                                        class="edit-designation-btn text-indigo-600 hover:text-indigo-900 mr-2">
                                                    Edit
                                                </button>
                                                <button data-designation-id="{{ $designation->id }}"
                                                        class="delete-designation-btn text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" colspan="3">No
                                                designations available
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                {{ $designations->links() }} {{-- Pagination links --}}
                            </div>


                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>

    {{-- Edit Designation Modal -  Styled Like Branch Edit Modal --}}
    <div id="editDesignationModal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title"
         role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"> {{-- Kept `sm:max-w-lg` to match branch modal width --}}
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4" id="modal-title"> {{-- Heading Style - consistent with branch modal --}}
                        Edit Designation
                    </h3>
                    <div class="mt-2">
                        <form id="editDesignationForm" class="space-y-6"> {{-- space-y-6 for form spacing --}}
                            @csrf
                            @method('PUT') {{-- Method spoofing for PUT request --}}

                            {{-- Designation Name Input Row -  Styled like Branch Modal --}}
                            <div class="grid grid-cols-[1fr_4fr] gap-4 border border-gray-300 rounded-md"> {{-- Grid and border styles from branch modal --}}
                                <label for="edit_designation_name"
                                       class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2"> {{-- Label Styles from branch modal --}}
                                    Designation Name
                                </label>
                                <div class="border-l border-gray-300">
                                    <input type="text" id="edit_designation_name" name="name"
                                           class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;"> {{-- Input Styles & Restrictions - consistent with branch modal --}}
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-5"> {{-- Button Container with gap --}}
                        <button id="updateDesignationButton" type="button"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-[#F9F7F7] bg-[#112D4E] hover:bg-[#3F72AF] w-full sm:w-auto sm:text-sm"> {{-- Button Style - consistent with branch modal --}}
                            Update
                        </button>
                        <button id="cancelEditDesignationModalButton" type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"> {{-- Cancel Button Style - consistent with branch modal --}}
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- Disable Paste Functionality for Designation Name Input in Add Form ---
            const designationNameInput = document.getElementById('name');
            if (designationNameInput) {
                designationNameInput.addEventListener('paste', function (event) {
                    event.preventDefault();
                    alert('Pasting is disabled in this field.'); // Optional alert message
                });
            }

            // --- Reusable Validation Functions ---
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

            // --- Validation Function for Designation Name ---
            function isValidDesignationName(name) {
                return /^[a-zA-Z\s]+$/.test(name); // Letters and spaces only for designation names (same as branch names)
            }

            const addDesignationForm = document.getElementById('addDesignationForm'); // Form ID for Add Designation Form
            const designationNameInputValidation = document.getElementById('name'); // Input field in Add Designation Form

            // --- Keypress Event Listener for Designation Name Input Restriction in Add Form ---
            designationNameInputValidation.addEventListener('keypress', function(event) {
                const char = String.fromCharCode(event.charCode);
                const newValue = this.value + char;
                if (!isValidDesignationName(newValue)) {
                    event.preventDefault();
                }
            });

            // --- Input Event Listener for Designation Name Error Display in Add Form ---
            designationNameInputValidation.addEventListener('input', function() {
                if (!isValidDesignationName(this.value)) {
                    displayError(this, 'Only letters and spaces are allowed in designation name.'); // Specific error message for designation name
                } else {
                    clearError(this);
                }
            });

            // --- Form Submission Validation for Add Designation Form ---
            addDesignationForm.addEventListener('submit', function(event) {
                clearError(designationNameInputValidation); // Clear any previous errors

                let hasErrors = false;

                if (!isValidDesignationName(designationNameInputValidation.value)) {
                    displayError(designationNameInputValidation, 'Designation name is invalid. Only letters and spaces are allowed.'); // Specific error message
                    hasErrors = true;
                }

                if (hasErrors) {
                    event.preventDefault();
                    alert('Please correct the errors in the form.');
                }
            });


            // --- Edit Designation Functionality ---
            const editDesignationModal = document.getElementById('editDesignationModal');
            const cancelEditDesignationModalButton = document.getElementById('cancelEditDesignationModalButton');
            const editDesignationForm = document.getElementById('editDesignationForm');
            const updateDesignationButton = document.getElementById('updateDesignationButton');
            let currentDesignationId = null;
            const editDesignationNameInputModal = document.getElementById('edit_designation_name'); // Modal input

            // --- Disable Paste in Edit Modal Input ---
            if (editDesignationNameInputModal) {
                editDesignationNameInputModal.addEventListener('paste', function(event) {
                    event.preventDefault();
                    alert('Pasting is disabled in this field.');
                });
            }

            // --- Keypress Restriction in Edit Modal Input ---
            if (editDesignationNameInputModal) {
                editDesignationNameInputModal.addEventListener('keypress', function(event) {
                    const char = String.fromCharCode(event.charCode);
                    if (!/^[a-zA-Z\s]+$/.test(char)) { // Only letters and spaces
                        event.preventDefault();
                    }
                });
            }


            document.querySelectorAll('.edit-designation-btn').forEach(button => {
                button.addEventListener('click', async (event) => {
                    currentDesignationId = event.currentTarget.dataset.designationId;
                    const designationId = event.currentTarget.dataset.designationId;

                    try {
                        const response = await fetch(`/designation/${designationId}/edit`);
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        const designationData = await response.json();

                        document.getElementById('edit_designation_name').value = designationData.name;
                        editDesignationModal.classList.remove('hidden');

                    } catch (error) {
                        console.error("Could not fetch designation data:", error);
                        alert('Failed to load designation details for editing.');
                    }
                });
            });

            updateDesignationButton.addEventListener('click', async () => {
                if (!currentDesignationId) return;

                const formData = new FormData(editDesignationForm);
                try {
                    const response = await fetch(`/designation/${currentDesignationId}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': formData.get('_token'),
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(Object.fromEntries(formData.entries()))
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const responseData = await response.json();
                    if (responseData.success) {
                        Swal.fire({  // SweetAlert2 for update success
                            icon: 'success',
                            title: 'Success!',
                            text: responseData.success,
                            timer: 2000,

                        });
                        editDesignationModal.classList.add('hidden');

                        // Update designation name in table
                        const updatedDesignationName = document.getElementById('edit_designation_name').value;
                        const designationRow = document.querySelector(`.edit-designation-btn[data-designation-id="${currentDesignationId}"]`).closest('tr');
                        if (designationRow) {
                            const nameCell = designationRow.querySelector('td:first-child');
                            if (nameCell) {
                                nameCell.textContent = updatedDesignationName;
                            }
                        }

                    } else {
                        alert('Failed to update designation: ' + (responseData.message || ''));
                    }

                } catch (error) {
                    console.error("Error updating designation:", error);
                    alert('Error updating designation: ' + error.message);
                }
            });

            cancelEditDesignationModalButton.addEventListener('click', () => {
                editDesignationModal.classList.add('hidden');
            });


            // --- Delete Designation Functionality with Confirmation ---
            document.querySelectorAll('.delete-designation-btn').forEach(button => {
                button.addEventListener('click', async (event) => {
                    const designationId = event.currentTarget.dataset.designationId;
                    const buttonElement = event.currentTarget;

                    Swal.fire({ // SweetAlert2 confirmation
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                const response = await fetch(`/designation/${designationId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                        'Accept': 'application/json'
                                    }
                                });

                                if (!response.ok) {
                                    throw new Error(`HTTP error! status: ${response.status} - ${response.statusText}`);
                                }
                                const responseData = await response.json();

                                if (responseData.success) {
                                    Swal.fire({ // SweetAlert2 success for delete
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: responseData.success,
                                        timer: 2000,
                                    }).then(() => {
                                        const rowToRemove = buttonElement.closest('tr');
                                        if (rowToRemove) {
                                            rowToRemove.remove();
                                        }
                                    });

                                } else {
                                    Swal.fire({  // SweetAlert2 for delete failure
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Failed to delete designation. ' + (responseData.message || ''),
                                    });
                                }

                            } catch (error) {
                                console.error("Error deleting designation:", error);
                                Swal.fire({  // SweetAlert2 for fetch error
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Error deleting designation: ' + error.message,
                                });
                            }
                        }
                    });
                });
            });


            // --- SweetAlert2 for Success Message after Form Submission ---
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 2000, // Optional: Auto-close after 2 seconds
            });
            @endif


        });

        // --- Disable Paste and Autocomplete for Search Input & Restrict Characters ---
        const designationSearchInput = document.getElementById('default-search'); // Get search input by ID
        if (designationSearchInput) {
            designationSearchInput.addEventListener('keypress', function (event) {
                const char = String.fromCharCode(event.charCode);
                if (!/^[a-zA-Z0-9\s]+$/.test(char)) {
                    event.preventDefault();
                }
            });
            designationSearchInput.addEventListener('paste', function (event) {
                event.preventDefault();
                alert('Pasting is disabled in the search field.');
            });
        }
    </script>

</x-app-layout>
