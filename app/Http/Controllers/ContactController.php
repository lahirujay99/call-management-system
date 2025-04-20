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
            'title' => ['required', 'string', 'in:Mr,Ms,Mrs'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'designation_id' => ['required', 'integer', 'exists:designations,id'],
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
            'extension_code' => ['nullable', 'string', 'max:10'],
            'personal_mobile' => ['required', 'string', 'min:10', 'max:12'],
            'personal_mobile_2' => ['nullable', 'string', 'min:10', 'max:12'],
            'personal_mobile_3' => ['nullable', 'string', 'min:10', 'max:12'],
            'active_status' => ['required', 'in:active,disable temporally'],
            'contact_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // 2. Handle image upload if present
        if ($request->hasFile('contact_image') && $request->file('contact_image')->isValid()) {
            $image = $request->file('contact_image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store image in public/images/contacts directory
            $image->move(public_path('images/contacts'), $imageName);

            // Set image path for database
            $validatedData['image_path'] = 'images/contacts/' . $imageName;
        }

        // 3. Create a new Contact model instance and fill it with validated data
        $contact = Contact::create($validatedData);

        // 4. Redirect the user with a success message
        return redirect()->route('contacts.create')->with('success', 'Contact saved successfully!');
    }

    public function index(Request $request)
    {
        $query = Contact::query()->with('branch', 'designation');

        // Search Functionality
        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhereHas('designation', function ($designationQuery) use ($search) {
                        $designationQuery->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('branch', function ($branchQuery) use ($search) {
                        $branchQuery->where('name', 'like', "%$search%");
                    })
                    ->orWhere('extension_code', 'like', "%$search%")
                    ->orWhere('personal_mobile', 'like', "%$search%");
            });
        }

        // NEW: Designation Filter
        $designationFilter = $request->input('designation_filter');
        if ($designationFilter) {
            $query->where('designation_id', $designationFilter);
        }

        // NEW: Branch Filter
        $branchFilter = $request->input('branch_filter');
        if ($branchFilter) {
            $query->where('branch_id', $branchFilter);
        }

        // Sorting Functionality
        $sortBy = $request->input('sortBy');
        $sortDirection = $request->input('sortDirection', 'asc');

        if ($sortBy) {
            if ($sortBy == 'designation') {
                $query->orderBy(
                    Designation::select('name')
                        ->whereColumn('designations.id', 'contacts.designation_id'),
                    $sortDirection
                );
            } else if ($sortBy == 'branch') {
                $query->orderBy(
                    Branch::select('name')
                        ->whereColumn('branches.id', 'contacts.branch_id'),
                    $sortDirection
                );
            } else {
                $query->orderBy($sortBy, $sortDirection);
            }
        } else {
            $query->latest('created_at');
        }

        $contacts = $query->paginate(8);
        $branches = Branch::all();
        $designations = Designation::all();

        return view('dashboard', compact('contacts', 'branches', 'designations', 'search'));
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
        $contact->load('branch', 'designation');
        return response()->json($contact);
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
        // Validate request data
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'in:Mr,Ms,Mrs'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'designation_id' => ['required', 'integer', 'exists:designations,id'],
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
            'extension_code' => ['nullable', 'string', 'max:10'],
            'personal_mobile' => ['required', 'string', 'min:10', 'max:12'],
            'personal_mobile_2' => ['nullable', 'string', 'min:10', 'max:12'],
            'personal_mobile_3' => ['nullable', 'string', 'min:10', 'max:12'],
            'active_status' => ['required', 'in:active,disable temporally'],
            'contact_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Handle image upload if present
        if ($request->hasFile('contact_image') && $request->file('contact_image')->isValid()) {
            // Delete old image if exists
            if ($contact->image_path && file_exists(public_path($contact->image_path))) {
                unlink(public_path($contact->image_path));
            }

            $image = $request->file('contact_image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store image in public/images/contacts directory
            $image->move(public_path('images/contacts'), $imageName);

            // Set image path for database
            $validatedData['image_path'] = 'images/contacts/' . $imageName;
        }

        $contact->update($validatedData);

        // Return success message AND updated contact data
        $contact->load('branch', 'designation');
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
