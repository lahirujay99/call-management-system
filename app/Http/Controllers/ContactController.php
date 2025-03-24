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
}
