<?php


use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Department\DepartmentController;
use App\Http\Controllers\Web\Employee\EmployeeController;
use App\Http\Controllers\Web\Home\HomeController;
use App\Http\Controllers\Web\Task\TaskController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;








Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// dashboard routes
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth:employee');
Route::middleware('auth:employee')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);

});