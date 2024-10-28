<?php

namespace App\Repositories\Interfaces\Task;

interface TaskRepositoryInterface
{
    public function all();
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function search($searchTerm);
    public function getEmployees();
}
