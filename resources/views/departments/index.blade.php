@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Departments</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Department</a>
        <form method="GET" action="{{ route('departments.index') }}" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Search departments..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Employee Count</th>
                <th>Total Salaries</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->employees_count }}</td>
                    <td>{{ $department->employees->sum('salary') }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this department?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No departments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
