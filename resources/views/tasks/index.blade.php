@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tasks</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
        <form method="GET" action="{{ route('tasks.index') }}" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Search tasks..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Assigned Employee</th> <!-- Added column for employee -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ Str::limit($task->description, 50) }}</td>
                    <td>
                        <span class="badge {{ $task->status === 'completed' ? 'bg-success' : ($task->status === 'in_progress' ? 'bg-warning' : 'bg-danger') }}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </td>
                    <td>
                        {{ $task->employee->first_name }} {{ $task->employee->last_name }} <!-- Display employee name -->
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No tasks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
