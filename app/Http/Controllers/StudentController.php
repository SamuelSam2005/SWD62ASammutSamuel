<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index(Request $request)
    {
        // Fetch all colleges for the dropdown filter
        $colleges = College::all();
    
        // Get selected filter values from request
        $selectedCollege = $request->input('college_id');
        $sortOrder = $request->input('sort', 'asc'); // Default sorting is A-Z
    
        // Query students based on filtering and sorting
        $students = Student::with('college')
            ->when($selectedCollege, function ($query) use ($selectedCollege) {
                return $query->where('college_id', $selectedCollege);
            })
            ->orderBy('name', $sortOrder) // Sort by student name
            ->get();
    
        return view('students.index', compact('students', 'colleges', 'selectedCollege', 'sortOrder'));
    }
    


    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $colleges = College::all(); // Fetch all colleges for dropdown selection
        return view('students.create', compact('colleges'));
    }

    /**
     * Store a newly created student in the database.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate(
            ['name' => 'required|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:8',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',]
        );

        // Create new student
        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        $colleges = College::all(); // Fetch all colleges for dropdown selection
        return view('students.edit', compact('student', 'colleges'));
    }

    /**
     * Update the specified student in the database.
     */
    public function update(Request $request, Student $student)
    {
        // Validate input
        $request->validate(
            ['name' => 'required|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|digits:8',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',]
        );

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified student from the database.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
