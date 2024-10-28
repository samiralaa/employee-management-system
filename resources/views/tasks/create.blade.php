@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}" class="shadow p-4 bg-white rounded">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

   
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" >
                <option value="" disabled selected>Select Status</option>
                <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ old('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

               
        
        <div class="mb-3">
            <label for="employee_id" class="form-label">Assign to Employee</label>
            <select class="form-select" aria-label="Default select example"  id="employee_id" name="employee_id">
                <option value="" disabled selected>Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
            @error('employee_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#employee_id').select2({
            placeholder: 'Select Employee',
            allowClear: true
        });
    });
</script>
@endsection
