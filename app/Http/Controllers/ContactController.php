<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Branch;
use App\Models\Designation;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $branches = Branch::all(); // Fetch all branches from the database
        $designations = Designation::all(); // Fetch all designations from the database
        return view('contacts.create', compact('branches', 'designations')); // Pass branches and designations to the view
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validate the request data
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'], // Very basic rules
            'last_name' => ['required', 'string', 'max:255'],  // Very basic rules
            'designation_id' => ['required', 'integer', 'exists:designations,id'],
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
            'extension_code' => ['nullable', 'string', 'max:10'], // Basic rules
            'personal_mobile' => ['required', 'string', 'min:10', 'max:12'], // Basic rules
            'active_status' => ['required', 'in:active,disable temporally'],
        ]);

        // 2. Create a new Contact model instance and fill it with validated data
        $contact = Contact::create($validatedData);

        // 3. Redirect the user with a success message
        return redirect()->route('contacts.create')->with('success', 'Contact saved successfully!');
    }

    /**
     * Display a listing of the contacts.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Contact::query()->with('branch', 'designation'); // Eager load 'branch' and 'designation' relationship to avoid N+1 query problems

        // **Search Functionality**
        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhereHas('designation', function ($designationQuery) use ($search) { // Search within designation name
                        $designationQuery->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('branch', function ($branchQuery) use ($search) { // Search within the branch name
                        $branchQuery->where('name', 'like', "%$search%");
                    })
                    ->orWhere('extension_code', 'like', "%$search%")
                    ->orWhere('personal_mobile', 'like', "%$search%");
            });
        }

        // **Sorting Functionality**
        $sortBy = $request->input('sortBy');
        $sortDirection = $request->input('sortDirection', 'asc'); // Default sorting direction is ascending

        if ($sortBy) {
            if ($sortBy == 'designation') {
                // Sort by designation name
                $query->orderBy(
                    Designation::select('name')
                        ->whereColumn('designations.id', 'contacts.designation_id'),
                    $sortDirection
                );
            } else if ($sortBy == 'branch') {
                // Sort by branch name
                $query->orderBy(
                    Branch::select('name')
                        ->whereColumn('branches.id', 'contacts.branch_id'),
                    $sortDirection
                );
            } else {
                $query->orderBy($sortBy, $sortDirection); // Sort by other contact fields
            }
        } else {
            $query->latest('created_at'); // Default sorting: newest contacts first
        }

        $contacts = $query->paginate(8); // Fetch contacts with pagination (adjust number per page as needed)
        $branches = Branch::all(); // Fetch all branches for dropdown filters (if you intend to use them later for filtering, not sorting in this version)
        $designations = Designation::all(); // Fetch all designations

        return view('dashboard', compact('contacts', 'branches', 'designations', 'search')); // Pass data to the dashboard view
    }

    /**
     * Show the form for editing the specified contact.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Contact $contact)
    {
        // Eager load relations to ensure branch_id and designation_id are available in JSON
        $contact->load('branch', 'designation'); // Explicitly load relations
        return response()->json($contact); // Return contact data as JSON for the modal
    }

    /**
     * Update the specified contact in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Contact $contact)
    {
        // Validate request data (reuse validation rules from store or modify as needed)
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'designation_id' => 'required|exists:designations,id', // Validation for designation_id
            'branch_id' => 'required|exists:branches,id',
            'extension_code' => 'nullable|string|max:20',
            'personal_mobile' => 'required|string|max:20',
            'active_status' => 'required|in:active,disable temporally',
        ]);

        $contact->update($validatedData); // Update the contact

        // Option 1: Return just success message:
        // return response()->json(['success' => 'Contact updated successfully']);

        // Option 2: Return success message AND updated contact data (for direct table row update in JS):
        $contact->load('branch', 'designation'); // Reload relations after update if needed to get updated related data
        return response()->json(['success' => 'Contact updated successfully', 'contact' => $contact]);
    }

    /**
     * Remove the specified contact from storage.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete(); // Delete the contact
        return response()->json(['success' => 'Contact deleted successfully']); // Return success JSON response
    }
}
