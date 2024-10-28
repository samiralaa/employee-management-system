<?php

namespace App\Services\Department;

use App\Repositories\Interfaces\Department\DepartmentRepositoryInterface;

class DepartmentService
{
    protected $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function getAllDepartments($search = null)
    {
        return $this->departmentRepository->all($search);
    }

    public function getDepartment($id)
    {
        return $this->departmentRepository->find($id);
    }

    public function createDepartment(array $data)
    {
        return $this->departmentRepository->create($data);
    }

    public function updateDepartment($id, array $data)
    {
        return $this->departmentRepository->update($id, $data);
    }

    public function deleteDepartment($id)
    {
        return $this->departmentRepository->delete($id);
    }
}
