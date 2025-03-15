@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="container">
        <h1>Edit Student</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name" value="{{ $student->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $student->email }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $student->phone }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{ $student->dob }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">College</label>
                <select class="form-control" name="college_id" required>
                    @foreach ($colleges as $college)
                        <option value="{{ $college->id }}" @if($college->id == $student->college_id) selected @endif>
                            {{ $college->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
@endsection
