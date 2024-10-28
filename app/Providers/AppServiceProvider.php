<?php

namespace App\Providers;

use App\Repositories\Implementations\Department\DepartmentRepository;
use App\Repositories\Implementations\Employee\EmployeeRepository;
use App\Repositories\Implementations\Task\TaskRepository;
use App\Repositories\Interfaces\Department\DepartmentRepositoryInterface;
use App\Repositories\Interfaces\Employee\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\Task\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);



    }

    public function boot(): void
    {
        //
    }
}
