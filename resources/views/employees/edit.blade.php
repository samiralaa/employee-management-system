@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Employee</h1>

        <div class="card">
            <div class="card-header">
                <h2>Update Employee Details</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name"
                            value="{{ old('first_name', $employee->first_name) }}" required>
                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name"
                            value="{{ old('last_name', $employee->last_name) }}" required>
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email', $employee->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="manager_id">Manager</label>
                        <select name="manager_id" class="form-control" id="manager_id">
                            <option value="">Select Manager</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}"
                                    {{ old('manager_id', $employee->manager_id) == $manager->id ? 'selected' : '' }}>
                                    {{ $manager->first_name }} {{ $manager->last_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('manager_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="department_id">Department</label>
                        <select name="department_id" class="form-control" id="department_id">
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="image">Profile Image</label>
                        <div class="mb-2">
                            @if ($employee->image)
                                <img src="{{ asset('storage/employees/' . $employee->image) }}" alt="Current Profile Image"
                                    class="img-thumbnail" style="width: 150px; height: auto;">
                            @else
                                <p>No image available.</p>
                            @endif
                        </div>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Employee</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
