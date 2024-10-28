<?php

namespace App\Repositories\Interfaces\Employee;

use App\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function all();                      // Get all employees
    public function findById(int $id): ?Employee;     // Find employee by ID
    public function create(array $data): Employee;     // Create a new employee
    public function update(int $id, array $data): bool; // Update an existing employee
    public function delete(int $id): bool;
    public function search($searchTerm, array $columns);
    public function paginate(int $perPage, $columns = ['*']);

}
