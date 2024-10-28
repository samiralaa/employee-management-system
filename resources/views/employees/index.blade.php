@extends('layouts.app')

@section('title', 'Employees List')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Employee Directory</h1>

        {{-- Add Employee Button --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Employee List</h2>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        </div>

        <!-- Search Form -->
        <form action="{{ route('home') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name..." value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Manager</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $index => $employee)
                        <tr>
                            <td class="text-center">{{ $employees->firstItem() + $index }}</td>
                            <td class="text-center">
                                @if ($employee->image)
                                    <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" style="width: 50px; height: 50px; border-radius: 50%;">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Default Image" style="width: 50px; height: 50px; border-radius: 50%;">
                                @endif
                            </td>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>
                                {{ $employee->manager->first_name ?? 'N/A' }} {{ $employee->manager->last_name ?? 'N/A' }}
                            </td>
                            <td>{{ $employee->department->name ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item {{ $employees->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $employees->url(1) }}">First</a>
                        </li>
                        <li class="page-item {{ $employees->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $employees->previousPageUrl() }}">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $employees->lastPage(); $i++)
                            <li class="page-item {{ $i == $employees->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $employees->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $employees->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $employees->nextPageUrl() }}">Next</a>
                        </li>
                        <li class="page-item {{ $employees->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $employees->url($employees->lastPage()) }}">Last</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
