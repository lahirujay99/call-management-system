<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DesignationController extends Controller
{
    /**
     * Show the form for creating a new designation and listing existing ones.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Designation::query();
        $search = $request->input('search');

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        $designations = $query->paginate(10); // Adjust pagination as needed

        return view('designation.create', compact('designations', 'search')); // Pass designations and search term to the view
    }

    /**
     * Show the form for creating a new designation.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        // Redirect to the index method which handles both form display and designation listing
        return redirect()->route('designation.index');
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

        return redirect()->route('designation.index')->with('success', 'Designation added successfully!'); // Redirect to index
    }

    /**
     * Remove the specified designation from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        if (request()->expectsJson()) {
            return response()->json(['success' => 'Designation deleted successfully!']);
        } else {
            return redirect()->route('designation.index')->with('success', 'Designation deleted successfully!');
        }
    }

    /**
     * Show the form for editing the specified designation.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Designation $designation)
    {
        return response()->json($designation); // Return designation data as JSON for modal
    }

    /**
     * Update the specified designation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Designation $designation)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:designations,name,' . $designation->id . '|max:255', // Unique except for current designation
        ]);

        $designation->update($validatedData);
        return response()->json(['success' => 'Designation updated successfully']); // Return success JSON
    }
}
