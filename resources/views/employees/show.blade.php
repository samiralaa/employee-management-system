@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Employee Details</h1>

        <div class="row">
            <div class="col-md-4 text-center">
                <!-- Employee Image -->
                <div class="mb-4">
                    <img src="{{ $employee->image ? asset('storage/' . $employee->image) : asset('images/default-avatar.png') }}"
                         alt="Employee Image"
                         class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                </div>
                <h3>{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                <p>Email: {{ $employee->email }}</p>
                <p>Manager: {{ $employee->manager->first_name ?? 'N/A' }} {{ $employee->manager->last_name ?? 'N/A' }}</p>
                <p>Department: {{ $employee->department->name ?? 'N/A' }}</p>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit Employee</a>
            </div>

            <div class="col-md-8">
                <h2>Assigned Tasks</h2>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>Tasks List</h3>
                    <a href="{{ route('tasks.create', ['employee_id' => $employee->id]) }}" class="btn btn-primary">Add Task</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>#</th>
                                <th>Task Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employee->tasks as $index => $task)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td class="text-center">
                                        <span class="badge {{ $task->status == 'completed' ? 'bg-success' : 'bg-warning' }}">
                                            {{ ucfirst($task->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No tasks found for this employee.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
