<?php

namespace App\Repositories\Implementations\Employee;

use App\Models\Employee;
use App\Repositories\Interfaces\Employee\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function all($search = null)
    {
        $query = Employee::query();

        if ($search) {
            $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%');
        }

        return $query->with(['manager', 'department'])->paginate(10);
    }

    /**
     * Find employee by ID
     *
     * @param int $id
     * @return Employee|null
     */
    public function findById(int $id): ?Employee
    {
    {
        return Employee::with('tasks')->find($id);
    }
    }

    /**
     * Create a new employee
     *
     * @param array $data
     * @return Employee
     */
    public function create(array $data): Employee
    {
        return Employee::create($data);
    }


    public function update(int $id, array $data): bool
    {
        $employee = $this->findById($id);
        return $employee ? $employee->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $employee = $this->findById($id);
        return $employee ? $employee->delete() : false;
    }

    public function search($searchTerm, array $columns)
    {
        return Employee::where(function ($query) use ($searchTerm, $columns) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', "%{$searchTerm}%");
            }
        })->get();
    }

    public function paginate(int $perPage, $columns = ['*'])
    {
        return Employee::paginate($perPage, $columns);
    }
}
