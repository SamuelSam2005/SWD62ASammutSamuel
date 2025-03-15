@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="container">
        <h1>Add a New Student</h1>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <div class="mb-3">
                <label class="form-label">College</label>
                <select class="form-control" name="college_id" required>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}">{{ $college->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save Student</button>
        </form>
    </div>
@endsection
