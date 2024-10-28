@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Department</h1>

    <form method="POST" action="{{ route('departments.update', $department->id) }}" class="shadow p-4 bg-white rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Department Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $department->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Update Department</button>
    </form>
</div>
@endsection
