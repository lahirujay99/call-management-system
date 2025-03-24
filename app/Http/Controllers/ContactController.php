<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Branch;
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
        return view('contacts.create',compact('branches')); // Pass branches to the view
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validate the request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255', // Validate that branch_id is selected from existing branches table and id column
            'branch_id' => 'required|exists:branches,id',
            'extension_code' => 'nullable|string|max:20',
            'personal_mobile' => 'required|string|max:20',
        ]);

        // 2. Create a new Contact model instance and fill it with validated data
        $contact = Contact::create($validatedData);

        // 3. Redirect the user with a success message
        return redirect()->route('contacts.create')->with('success', 'Contact saved successfully!');
    }

    /**
     * Display a listing of the contacts.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Contact::query()->with('branch'); // Eager load 'branch' relationship to avoid N+1 query problems

        // **Search Functionality**
        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhere('designation', 'like', "%$search%")
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
            if ($sortBy == 'branch') {
                // Sort by branch name, requires a join or subquery, using subquery for simplicity here
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


        return view('dashboard', compact('contacts', 'branches', 'search')); // Pass data to the dashboard view
    }
}
