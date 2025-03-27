<?php

namespace App\Http\Controllers;


use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DesignationController extends Controller
{
    /**
     * Show the form for creating a new designation.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('designation.create');
    }

    /**
     * Store a newly created Designation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:designations|max:255', // Ensure designation name is unique in designation table
        ]);

        Designation::create($validatedData);

        return redirect()->route('designation.create')->with('success', 'Designation added successfully!');
    }
}
