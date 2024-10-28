<?php

namespace App\Services\Task;

use App\Models\Task;
use App\Repositories\Interfaces\Task\TaskRepositoryInterface;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks($search = '')
    {
        return $this->taskRepository->all($search);
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask($id, array $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function deleteTask($id)
    {
        return $this->taskRepository->delete($id);
    }

    public function getEmployees()
    {
        return $this->taskRepository->getEmployees();
    }

    public function findTaskById($id)
    {
        return $this->taskRepository->findById($id);
    }
}