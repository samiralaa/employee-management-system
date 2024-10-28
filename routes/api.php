<?php

use App\Http\Controllers\Web\Employee\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('search',[EmployeeController::class,'search']);