@extends('layouts.app')

@section('title', 'Add College')

@section('content')
    <div class="container">
        <h1>Add a New College</h1>
        <form action="{{ route('colleges.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">College Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <button type="submit" class="btn btn-success">Save College</button>
        </form>
    </div>
@endsection
