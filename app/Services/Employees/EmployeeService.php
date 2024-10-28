<?php

namespace App\Services\Employees;

// app/Services/EmployeeService.php
use App\Traits\ImageUploadTrait;


use App\Repositories\Implementations\Employee\EmployeeRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    use ImageUploadTrait;
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAllEmployees($search = null)
    {
        return $this->employeeRepository->all($search);
    }

    public function find($id)
    {
        return $this->employeeRepository->findById($id);
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']); // Hash the password
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], 'employees'); // Upload the image
        }

        return $this->employeeRepository->create($data);
    }

    public function update($id, array $data)
    {
        // Check if the password needs to be hashed
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']); // Hash the password
        }
    
        // Handle image upload
        if (isset($data['image'])) {
            // If the employee exists, delete the old image
            $employee = $this->employeeRepository->findById($id); // Assuming `find` method exists
            if ($employee->image) {
                $this->deleteImage($employee->image); // Delete the old image
            }
            $data['image'] = $this->uploadImage($data['image'], 'employees'); // Upload new image
        }
    
        // Update the employee record
        return $this->employeeRepository->update($id, $data);
    }
    

    public function delete($id)
    {
        return $this->employeeRepository->delete($id);
    }
}
