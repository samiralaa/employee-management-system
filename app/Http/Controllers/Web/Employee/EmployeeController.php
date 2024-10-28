<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Requests\Employee\StoreEmployee;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Repositories\Interfaces\Employee\EmployeeRepositoryInterface;
use App\Services\Employees\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $employees = $this->employeeService->getAllEmployees($search);
        return view('employees.index', compact('employees'));
    }
    public function show($id)
    {
        $employee = $this->employeeService->find($id);
        return view('employees.show', compact('employee'));
    }
    public function create()
    {

        $managers  = Employee::where('is_manager', 1)->get();
        $departments = Department::all();
        return view('employees.create', compact('managers', 'departments'));
    }

    public function store(StoreEmployeeRequest $request)
    {

        $data = $request->validated();
        $this->employeeService->create($data);
        return redirect()->route('employees.index')->with('success', 'Successfully created new employee');
    }

    public function edit($id)
    {
        $employee = $this->employeeService->find($id);
        $departments = Department::all();
        $managers  = Employee::where('is_manager', 1)->get();
        return view('employees.edit', compact('employee', 'managers', 'departments'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {


        $data = $request->validated();

        $this->employeeService->update($id, $data);

        return redirect()->route('employees.index')->with('success', 'تم تحديث الموظف بنجاح');
    }

    public function destroy($id)
    {
        $this->employeeService->delete($id);
        return redirect()->route('employees.index')->with('success', 'تم حذف الموظف بنجاح');
    }
}
