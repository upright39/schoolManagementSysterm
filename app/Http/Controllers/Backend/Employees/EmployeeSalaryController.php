<?php

namespace App\Http\Controllers\Backend\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeSalarylog;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use  PDF;

class EmployeeSalaryController extends Controller
{
    public function EmployeeSalaryView()
    {
        $allData['Salary'] = User::where('usertype', 'Employee')->get();
        return view('backend.employees.employees_salary.view_employees_salary', $allData);
    }

    public function EmployeeSalaryIncrement($id)
    {
        $EditData['salaryIncrement'] = User::find($id);

        return view('backend.employees.employees_salary.increment_employees_salary', $EditData);
    }


    public function EmployeeSalaryIncrementStore(Request $request, $id)
    {
        $user = User::find($id);
        $previouseSalary = $user->salary;
        $presentSalary = (float)$previouseSalary + (float)$request->increment_salary;
        $user->salary = $presentSalary;
        $user->save();



        $salaryData = new EmployeeSalarylog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previouseSalary;
        $salaryData->present_salary = $presentSalary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
        $salaryData->save();


        $notification = [
            'message' => 'Employee Salary Increased  successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view_employees_salary')->with($notification);
    }

    public function EmployeeSalaryDetails($id)
    {
        $data['details'] = User::find($id);

        $data['salaryLogs'] = EmployeeSalarylog::where('employee_id', $data['details']->id)->get();

        return view('backend.employees.employees_salary.employees_salary_log', $data);
    }
}