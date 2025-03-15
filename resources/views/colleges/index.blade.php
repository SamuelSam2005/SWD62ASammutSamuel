@extends('layouts.app')

@section('title', 'Colleges List')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">Colleges</h1>
        <a href="{{ route('colleges.create') }}" class="btn btn-primary mb-3">Add New College</a>

        @if ($colleges->isEmpty())
            <div class="alert alert-warning">No colleges found.</div>
        @else
            <table class="table table-hover shadow-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colleges as $college)
                        <tr>
                            <td>{{ $college->name }}</td>
                            <td>{{ $college->address }}</td>
                            <td>
                                <!-- Fixed Edit Button -->
                                <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this college?');">
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
