<x-app-layout>
    <div class="bg-[#E7F2F8] rounded-lg md:rounded-3xl shadow-md overflow-hidden mx-auto max-w-full lg:max-w-7xl my-6">
        <div class="px-4 py-3 border-gray-300 flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4 bg-[#E7F2F8] rounded-t-lg">
            {{-- Search Bar --}}
            <div class="relative w-full sm:w-5/6">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <form action="{{ route('dashboard') }}" method="GET">
                    <input type="text" name="search" id="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-2xl leading-5 bg-white shadow-sm placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm" placeholder="Search" value="{{ $search ?? '' }}" autocomplete="off" onpaste="return false;">
                </form>
            </div>
        </div>

        <div class="bg-white rounded-bl-2xl rounded-br-2xl overflow-x-auto mt-3">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                <tr>
                    {{-- Photo column (first column) --}}
                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        Photo
                    </th>

                    {{-- Title column (second column) --}}
                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'title', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'title' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Title
                        </a>
                    </th>

                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'first_name', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'first_name' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            First Name
                        </a>
                    </th>
                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'last_name', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'last_name' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Last Name
                        </a>
                    </th>
                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'designation', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'designation' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Designation
                        </a>
                    </th>
                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'branch', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'branch' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Branch
                        </a>
                    </th>
                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'extension_code', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'extension_code' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Extension
                        </a>
                    </th>
                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        <a href="{{ route('dashboard', ['sortBy' => 'personal_mobile', 'sortDirection' => request('sortDirection') == 'asc' && request('sortBy') == 'personal_mobile' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                            Personal Num
                        </a>
                    </th>
                    <th scope="col" class="px-2 sm:px-6 py-3 text-left text-xs font-medium text-[#112D4E] uppercase tracking-wider">
                        Active Status
                    </th>
                    <th scope="col" class="relative px-2 sm:px-6 py-3">
                        <span class="sr-only">Edit & Delete</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($contacts as $contact)
                    <tr>
                        {{-- Photo column data --}}
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap">
                            @if($contact->image_path)
                                <img src="{{ asset($contact->image_path) }}" alt="{{ $contact->first_name }}" class="h-10 w-10 rounded-full object-cover">
                            @else
                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">{{ substr($contact->first_name, 0, 1) }}</span>
                                </div>
                            @endif
                        </td>

                        {{-- Title column data --}}
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $contact->title ?? 'N/A' }}
                        </td>

                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $contact->first_name }}
                        </td>
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->last_name }}
                        </td>
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->designation->name ?? "N/A" }}
                        </td>
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->branch->name ?? "N/A" }}
                        </td>
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->extension_code }}
                        </td>
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->personal_mobile }}
                        </td>
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ ucwords(str_replace('_', ' ', $contact->active_status)) }}
                        </td>
                        <td class="px-2 sm:px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            @if(Auth::user()->isAdmin())
                                <button data-contact-id="{{ $contact->id }}" class="edit-contact-btn text-cyan-600 hover:text-cyan-900 mr-2">Edit</button>
                                <button data-contact-id="{{ $contact->id }}" class="delete-contact-btn text-red-600 hover:text-red-900">Delete</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center" colspan="10">
                            No contacts found matching your search.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <hr class="mt-10 border-gray-400"/>
            <div class="mt-4 px-4 pb-3">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>

    {{-- Edit Contact Modal --}}
    <div id="editContactModal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex **items-center** justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"> {{-- ADDED items-center here to center vertically on larger screens and removed items-end --}}
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            {{-- Increased modal width to max-w-6xl --}}
            <div class="inline-block align-bottom bg-[#F9F7F7] md:bg-white p-4 rounded-lg shadow-md mt-16 mx-auto max-w-md sm:max-w-xl md:max-w-3xl lg:max-w-5xl xl:max-w-6xl text-left overflow-hidden md:shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full"> {{-- Responsive Modal Width --}}
                <div class="bg-[#F9F7F7] md:bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    {{-- Heading styles --}}
                    <h3 class="text-xl font-semibold text-black mb-4" id="modal-title">
                        Edit Contact
                    </h3>
                    <div class="mt-2">
                        <form id="editContactForm" class="space-y-6">
                            @csrf
                            @method('PUT') {{-- Method spoofing for PUT request --}}

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6"> {{-- Switch to single column on smaller screens --}}
                                <div> {{-- First Column --}}
                                    {{-- First Name Input Row --}}
                                    <div class="mb-4 sm:grid sm:grid-cols-[1fr_4fr] sm:gap-4 sm:border sm:border-gray-300 sm:rounded-md"> {{-- Desktop styles conditional --}}
                                        <label for="edit_first_name" class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2 sm:border-b-0">First Name</label> {{-- Remove bottom border on desktop --}}
                                        <div class="sm:border-l sm:border-gray-300"> {{-- Border only on desktop --}}
                                            <input type="text" id="edit_first_name" name="first_name" class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none sm:rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;"> {{-- Rounded right only on desktop --}}
                                        </div>
                                    </div>

                                    {{-- Designation Dropdown Input Row - CORRECTED to select with designation_id name --}}
                                    <div class="mb-4 sm:grid sm:grid-cols-[1fr_4fr] sm:gap-4 sm:border sm:border-gray-300 sm:rounded-md"> {{-- Desktop styles conditional --}}
                                        <label for="edit_designation_id" class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2 sm:border-b-0">Designation</label> {{-- Remove bottom border on desktop --}}
                                        <div class="sm:border-l sm:border-gray-300"> {{-- Border only on desktop --}}
                                            <select id="edit_designation_id" name="designation_id" class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none sm:rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;"> {{-- Rounded right only on desktop --}}
                                                <option value="" disabled selected>Select Designation</option>
                                                @foreach($designations as $designation)
                                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Extension Code Input Row --}}
                                    <div class="mb-4 sm:grid sm:grid-cols-[1fr_4fr] sm:gap-4 sm:border sm:border-gray-300 sm:rounded-md"> {{-- Desktop styles conditional --}}
                                        <label for="edit_extension_code" class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2 sm:border-b-0">Extension Code</label> {{-- Remove bottom border on desktop --}}
                                        <div class="sm:border-l sm:border-gray-300"> {{-- Border only on desktop --}}
                                            <input type="text" id="edit_extension_code" name="extension_code" class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none sm:rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;"> {{-- Rounded right only on desktop --}}
                                        </div>
                                    </div>

                                    {{-- Active Status Input Row --}}
                                    <div class="mb-4 sm:grid sm:grid-cols-[1fr_4fr] sm:gap-4 sm:border sm:border-gray-300 sm:rounded-md"> {{-- Desktop styles conditional --}}
                                        <label for="edit_active_status" class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2 sm:border-b-0">Active Status</label> {{-- Remove bottom border on desktop --}}
                                        <div class="sm:border-l sm:border-gray-300"> {{-- Border only on desktop --}}
                                            <select id="edit_active_status" name="active_status" class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none sm:rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;"> {{-- Rounded right only on desktop --}}
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="disable temporally">Disable Temporally</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div> {{-- Second Column --}}
                                    {{-- Last Name Input Row --}}
                                    <div class="mb-4 sm:grid sm:grid-cols-[1fr_4fr] sm:gap-4 sm:border sm:border-gray-300 sm:rounded-md"> {{-- Desktop styles conditional --}}
                                        <label for="edit_last_name" class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2 sm:border-b-0">Last Name</label> {{-- Remove bottom border on desktop --}}
                                        <div class="sm:border-l sm:border-gray-300"> {{-- Border only on desktop --}}
                                            <input type="text" id="edit_last_name" name="last_name" class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none sm:rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;"> {{-- Rounded right only on desktop --}}
                                        </div>
                                    </div>

                                    {{-- Branch Dropdown Input Row - CORRECTED to be select and with branch_id name--}}
                                    <div class="mb-4 sm:grid sm:grid-cols-[1fr_4fr] sm:gap-4 sm:border sm:border-gray-300 sm:rounded-md"> {{-- Desktop styles conditional --}}
                                        <label for="edit_branch_id" class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2 sm:border-b-0">Branch</label> {{-- Remove bottom border on desktop --}}
                                        <div class="sm:border-l sm:border-gray-300"> {{-- Border only on desktop --}}
                                            <select id="edit_branch_id" name="branch_id" class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black border-none sm:rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;"> {{-- Rounded right only on desktop --}}
                                                <option value="" disabled selected>Select Branch</option>
                                                @foreach($branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Personal Mobile Input Row --}}
                                    <div class="mb-4 sm:grid sm:grid-cols-[1fr_4fr] sm:gap-4 sm:border sm:border-gray-300 sm:rounded-md"> {{-- Desktop styles conditional --}}
                                        <label for="edit_personal_mobile" class="block py-3 px-3 text-gray-600 text-sm font-medium text-left leading-tight pr-2 sm:border-b-0">Personal Mobile</label> {{-- Remove bottom border on desktop --}}
                                        <div class="sm:border-l sm:border-gray-300"> {{-- Border only on desktop --}}
                                            <input type="text" id="edit_personal_mobile" name="personal_mobile" class="shadow-sm py-3 px-3 block w-full sm:text-sm text-black placeholder-black border-none sm:rounded-r-md bg-white focus:outline-none" autocomplete="off" onpaste="return false;"> {{-- Rounded right only on desktop --}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-5">
                        {{-- Update Button Styles - Reusing Save Button Styles --}}
                        <button id="updateContactButton" type="button" class=" inline-flex justify-center py-2 px-4 border border-transparent shadow-sm font-medium rounded-md text-[#F9F7F7] bg-[#112D4E] hover:bg-[#3F72AF] w-full sm:w-auto sm:text-sm">
                            Update
                        </button>
                        {{-- Cancel Button Styles --}}
                        <button id="cancelEditModalButton" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
            const editContactModal = document.getElementById('editContactModal');
            const cancelEditModalButton = document.getElementById('cancelEditModalButton');
            const editContactForm = document.getElementById('editContactForm');
            const updateContactButton = document.getElementById('updateContactButton');
            let currentContactId = null; // To store the ID of the contact being edited

            const editFirstNameInput = document.getElementById('edit_first_name');
            const editLastNameInput = document.getElementById('edit_last_name');
            const editExtensionCodeInput = document.getElementById('edit_extension_code');
            const editPersonalMobileInput = document.getElementById('edit_personal_mobile');

            const modalInputs = [editFirstNameInput, editLastNameInput, editExtensionCodeInput, editPersonalMobileInput];

            // Loop through each input and add disable paste event listener
            modalInputs.forEach(inputElement => {
                if (inputElement) { // Check if element exists before adding listener
                    inputElement.addEventListener('paste', function(event) {
                        event.preventDefault();
                        alert('Pasting is disabled in this field.');
                    });
                }
            });

            // --- Keypress Event Listeners for Input Restriction in Modal ---
            if (editFirstNameInput) {
                editFirstNameInput.addEventListener('keypress', function(event) {
                    const char = String.fromCharCode(event.charCode);
                    if (!/^[a-zA-Z\s]+$/.test(char)) { // Only letters and spaces
                        event.preventDefault();
                    }
                });
            }
            if (editLastNameInput) {
                editLastNameInput.addEventListener('keypress', function(event) {
                    const char = String.fromCharCode(event.charCode);
                    if (!/^[a-zA-Z\s]+$/.test(char)) { // Only letters and spaces
                        event.preventDefault();
                    }
                });
            }
            if (editExtensionCodeInput) {
                editExtensionCodeInput.addEventListener('keypress', function(event) {
                    const char = String.fromCharCode(event.charCode);
                    if (!/^[0-9\s]+$/.test(char)) { // Only numbers and spaces
                        event.preventDefault();
                    }
                    if (char === '-') { // Prevent hyphens
                        event.preventDefault();
                    }
                });
            }
            if (editPersonalMobileInput) {
                editPersonalMobileInput.addEventListener('keypress', function(event) {
                    const char = String.fromCharCode(event.charCode);
                    if (!/^[0-9\s]+$/.test(char)) { // Only numbers and spaces
                        event.preventDefault();
                    }
                    if (char === '-') { // Prevent hyphens
                        event.preventDefault();
                    }
                });
            }


            // --- Edit Functionality ---
            document.querySelectorAll('.edit-contact-btn').forEach(button => {
                button.addEventListener('click', async (event) => {
                    currentContactId = event.currentTarget.dataset.contactId;
                    const contactId = event.currentTarget.dataset.contactId;

                    try {
                        const response = await fetch(`/tp/contacts/${contactId}/edit`); // Fetch contact data
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        const contactData = await response.json();

                        // Populate the modal form fields - CORRECTED POPULATION
                        document.getElementById('edit_first_name').value = contactData.first_name;
                        document.getElementById('edit_last_name').value = contactData.last_name;
                        document.getElementById('edit_designation_id').value = contactData.designation_id; // Set select value by ID
                        document.getElementById('edit_branch_id').value = contactData.branch_id;       // Set select value by ID
                        document.getElementById('edit_extension_code').value = contactData.extension_code;
                        document.getElementById('edit_personal_mobile').value = contactData.personal_mobile;
                        document.getElementById('edit_active_status').value = contactData.active_status;

                        editContactModal.classList.remove('hidden'); // Show the modal

                    } catch (error) {
                        console.error("Could not fetch contact data:", error);
                        alert('Failed to load contact details for editing.');
                    }
                });
            });

            updateContactButton.addEventListener('click', async () => {
                if (!currentContactId) return;

                const formData = new FormData(editContactForm);
                try {
                    const response = await fetch(`/tp/contacts/${currentContactId}`, {
                        method: 'PUT', // Use PUT to update
                        headers: {
                            'X-CSRF-TOKEN': formData.get('_token'), // Include CSRF token
                            'Content-Type': 'application/json', // Specify JSON content type
                            'Accept': 'application/json'       // Expect JSON response
                        },
                        body: JSON.stringify(Object.fromEntries(formData.entries())) // Send form data as JSON
                    });

                    if (!response.ok) {
                        // Non-successful HTTP status - handle errors and validation issues
                        const errorData = await response.json(); // Try to get error response in JSON

                        if (response.status === 422 && errorData.errors) { // Validation errors
                            let errorMessages = Object.values(errorData.errors).flat().join('<br>');
                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                html: errorMessages, // Display validation errors using SweetAlert
                            });

                        } else { // Other server errors
                            throw new Error(`HTTP error! status: ${response.status} - ${response.statusText}`);
                        }
                        return; // Stop further execution if error occurred.

                    }

                    const responseData = await response.json();
                    if (responseData.success) {
                        Swal.fire({  // Use SweetAlert for success
                            icon: 'success',
                            title: 'Success!',
                            text: responseData.success,
                            timer: 2000,
                        });
                        editContactModal.classList.add('hidden'); // Hide modal

                        // OPTIONAL: Update the table row directly instead of full reload.
                        // Example (you'll need to adapt selector and data keys to match your table structure):
                        const updatedContact = responseData.contact; // If your controller sends back the updated contact data
                        const rowToUpdate = document.querySelector(`.edit-contact-btn[data-contact-id="${currentContactId}"]`).closest('tr');
                        if (rowToUpdate) {
                            rowToUpdate.cells[0].textContent = formData.get('first_name'); // Example update first name cell
                            rowToUpdate.cells[1].textContent = formData.get('last_name'); // Example update last name cell
                            rowToUpdate.cells[2].textContent = document.querySelector('#edit_designation_id option:checked').textContent; // Designation Name
                            rowToUpdate.cells[3].textContent = document.querySelector('#edit_branch_id option:checked').textContent; // Branch Name
                            rowToUpdate.cells[4].textContent = formData.get('extension_code');
                            rowToUpdate.cells[5].textContent = formData.get('personal_mobile');
                            rowToUpdate.cells[6].textContent = formData.get('active_status').replace('_', ' ');

                        } else {
                            window.location.reload(); // Fallback to reload if row not found (less ideal, but works)
                        }

                    } else {
                        alert('Failed to update contact.'); // Generic error if success is false (though unlikely now)
                    }

                } catch (error) {
                    console.error("Error updating contact:", error);
                    alert('Error updating contact: ' + error.message); // Show error message
                }
            });


            cancelEditModalButton.addEventListener('click', () => {
                editContactModal.classList.add('hidden'); // Hide modal on cancel
            });


            // --- Delete Functionality (SweetAlert2 Implementation) ---
            document.querySelectorAll('.delete-contact-btn').forEach(button => {
                button.addEventListener('click', async (event) => {
                    const contactId = event.currentTarget.dataset.contactId;

                    Swal.fire({
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
                                const response = await fetch(`/tp/contacts/${contactId}`, {
                                    method: 'DELETE', // Use DELETE method for deletion
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Get CSRF token from meta tag
                                        'Accept': 'application/json' // Expect JSON response
                                    }
                                });

                                if (!response.ok) {
                                    throw new Error(`HTTP error! status: ${response.status}`);
                                }
                                const responseData = await response.json();
                                if (responseData.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Contact has been deleted.',
                                        'success'
                                    ).then(() => { // After success alert is closed, reload the page
                                        window.location.reload();
                                    });

                                } else {
                                    Swal.fire({ // SweetAlert2 for error
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Failed to delete contact!',
                                    });
                                }


                            } catch (error) {
                                console.error("Error deleting contact:", error);
                                Swal.fire({ // SweetAlert2 for fetch error
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Error deleting contact.',
                                });
                            }
                        }
                    })
                });
            });

            // --- Restrict Search Input to Letters, Spaces, and Numbers (No changes needed) ---
            const searchInput = document.getElementById('search');
            if (searchInput) {
                searchInput.addEventListener('keypress', function(event) {
                    const char = String.fromCharCode(event.charCode);
                    // Allow letters (a-z, A-Z), numbers (0-9), and spaces
                    if (!/^[a-zA-Z0-9\s]+$/.test(char)) {
                        event.preventDefault(); // Prevent typing the character
                    }
                });
            }
        });

        // Disable pasting into the search input (No changes needed)
        const searchInput = document.getElementById('search');
        if (searchInput) {
            searchInput.addEventListener('paste', function(event) {
                event.preventDefault();
                alert('Pasting is disabled in the search field.'); // Optional alert message
            });
        }
    </script>
</x-app-layout>
