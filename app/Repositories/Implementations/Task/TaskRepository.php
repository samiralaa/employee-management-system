<?php

namespace App\Repositories\Implementations\Task;

use App\Models\Employee;
use App\Models\Task;
use App\Repositories\Interfaces\Task\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function all()
    {
        return Task::with(['employee', 'manager'])->get();
    }

    public function findById($id)
    {
        return Task::findOrFail($id);
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update($id, array $data)
    {
        $task = $this->findById($id);
        $task->update($data);
        return $task;
    }

    public function delete($id)
    {
        $task = $this->findById($id);
        $task->delete();
    }

    public function search($searchTerm)
    {
        return Task::where('title', 'like', "%{$searchTerm}%")
            ->orWhere('description', 'like', "%{$searchTerm}%")
            ->get();
    }

    public function getEmployees()
    {
        return Employee::select('first_name', 'last_name', 'id')->distinct()->get();
    }
}
