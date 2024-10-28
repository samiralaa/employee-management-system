<?php

namespace App\Http\Controllers\Web\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\Task\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->getAllTasks($request->input('search', ''));
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $employees = $this->taskService->getEmployees();
        return view('tasks.create', compact('employees'));
    }

    public function store(StoreTaskRequest $request)
    {
        $this->taskService->createTask($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $task = $this->taskService->findTaskById($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        
        $this->taskService->updateTask($id, $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $this->taskService->deleteTask($id);
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
