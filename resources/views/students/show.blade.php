@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
    <div class="container">
        <h1>Student Details</h1>
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Phone:</strong> {{ $student->phone }}</p>
        <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
        <p><strong>College:</strong> {{ $student->college->name }}</p>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
    </div>
@endsection
