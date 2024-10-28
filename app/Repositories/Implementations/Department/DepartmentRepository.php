<?php
namespace App\Repositories\Implementations\Department;

use App\Models\Department;
use App\Repositories\Interfaces\Department\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    public function all($search = null)
    {
        return Department::withCount('employees')
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })->get();
    }

    public function find($id)
    {
        return Department::findOrFail($id);
    }

    public function create(array $data)
    {
        return Department::create($data);
    }

    public function update($id, array $data)
    {
        $department = $this->find($id);
        $department->update($data);
        return $department;
    }

    public function delete($id)
    {
        $department = $this->find($id);
        if ($department->employees()->count() > 0) {
            throw new \Exception('Cannot delete department with employees.');
        }
        return $department->delete();
    }
}