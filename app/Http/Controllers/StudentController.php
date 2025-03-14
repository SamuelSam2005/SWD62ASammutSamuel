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
    public function index()
    {
        $students = Student::with('college')->get(); // Fetch all students with college data
        return view('students.index', compact('students'));
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
        // Validate request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:8',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        // Create new student record
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|digits:8',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

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
