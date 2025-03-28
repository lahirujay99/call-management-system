<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BranchController extends Controller
{
    /**
     * Show the form for creating a new branch.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        // Redirect to the index method which handles both form display and branch listing
        return redirect()->route('branches.index');
    }

    /**
     * Store a newly created branch in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:branches|max:255', // Ensure branch name is unique in branches table
        ]);

        Branch::create($validatedData);

        return redirect()->route('branches.index')->with('success', 'Branch added successfully!');
    }

    /**
     * Display a listing of the branches (for the table).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Branch::query();
        $search = $request->input('search');

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        $branches = $query->paginate(10); // Adjust pagination as needed

        return view('branches.create', compact('branches', 'search')); // Pass branches and search term to the view
    }

    /**
     * Remove the specified branch from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully!'); // Redirect back to index
    }

    /**
     * Show the form for editing the specified branch.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Branch $branch)
    {
        return response()->json($branch); // Return branch data as JSON for modal
    }

    /**
     * Update the specified branch in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Branch $branch)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:branches,name,' . $branch->id . '|max:255', // Unique except for current branch
        ]);

        $branch->update($validatedData);
        return response()->json(['success' => 'Branch updated successfully']); // Return success JSON
    }

}
