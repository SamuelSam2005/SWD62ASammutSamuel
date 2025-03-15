<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    /**
     * Display a listing of the colleges.
     */
    public function index()
    {
        $colleges = College::all(); // Fetch all colleges
        return view('colleges.index', compact('colleges')); // Return view with data
    }

    /**
     * Show the form for creating a new college.
     */
    public function create()
    {
        return view('colleges.create'); // Return the create form view
    }

    /**
     * Store a newly created college in the database.
     */
    public function store(Request $request)
{
    // Validate input
        $request->validate(
            ['name' => 'required|unique:colleges,name|max:255',
            'address' => 'required|max:500',]
        );

    // Create new college
    College::create($request->all());

    return redirect()->route('colleges.index')->with('success', 'College added successfully!');
}

    /**
     * Show the form for editing the specified college.
     */
    public function edit(College $college)
    {
        return view('colleges.edit', compact('college'));
    }

    /**
     * Update the specified college in the database.
     */
    public function update(Request $request, College $college)
{
    // Validate input
        $request->validate(
            ['name' => 'required|unique:colleges,name,' . $college->id . '|max:255',
            'address' => 'required|max:500',]
        );

    $college->update($request->all());

    return redirect()->route('colleges.index')->with('success', 'College updated successfully!');
}

    /**
     * Remove the specified college from the database.
     */
    public function destroy(College $college)
    {
        $college->delete();
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully!');
    }
}
