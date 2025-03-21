@extends('layouts.app')

@section('title', 'Students List')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Students</h1>

        <!-- Filter and Sort Form -->
        <form method="GET" action="{{ route('students.index') }}" class="mb-3">
            <div class="row">
                <!-- College Filter -->
                <div class="col-md-4">
                    <select name="college_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Colleges</option>
                        @foreach ($colleges as $college)
                            <option value="{{ $college->id }}" {{ $selectedCollege == $college->id ? 'selected' : '' }}>
                                {{ $college->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sorting Buttons -->
                <div class="col-md-4">
                    <a href="{{ route('students.index', ['college_id' => $selectedCollege, 'sort' => 'asc']) }}"
                        class="btn btn-outline-primary {{ $sortOrder == 'asc' ? 'active' : '' }}">
                        Sort A-Z
                    </a>
                    <a href="{{ route('students.index', ['college_id' => $selectedCollege, 'sort' => 'desc']) }}"
                        class="btn btn-outline-primary {{ $sortOrder == 'desc' ? 'active' : '' }}">
                        Sort Z-A
                    </a>
                </div>

                <!-- Reset Button -->
                <div class="col-md-2">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>

        @if ($students->isEmpty())
            <div class="alert alert-warning">No students found.</div>
        @else
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>College</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->college->name }}</td>
                            <td>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
