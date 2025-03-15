@extends('layouts.app')

@section('title', 'Edit College')

@section('content')
    <div class="container">
        <h1>Edit College</h1>
        <form action="{{ route('colleges.update', $college->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">College Name</label>
                <input type="text" class="form-control" name="name" value="{{ $college->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $college->address }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update College</button>
        </form>
    </div>
@endsection
