<?php

namespace App\Http\Controllers\Backend\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeSalarylog;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use  PDF;
use App\Models\EmployeeLeave;
use App\Models\EmployeeLeavePurpose;

class EmployeeLeaveController extends Controller
{
    //
    public function EmployeeLeaveView()
    {
        $Data['allData'] = EmployeeLeave::orderBy('id', 'desc')->get();
        return  view('backend.employees.employees_leave.employee_leave_view', $Data);
    }

    public function EmployeeLeaveAdd()
    {
        $data['employees'] = User::where('usertype', 'Employee')->get();
        $data['Purposes'] = EmployeeLeavePurpose::all();

        return  view('backend.employees.employees_leave.employee_leave_add', $data);
    }

    public function EmployeeLeaveStore(Request $request)
    {
        if ($request->emp_Leave_purpose_id == '0') {

            $leavePurpose = new EmployeeLeavePurpose();
            $leavePurpose->leave_purpose  = $request->name;
            $leavePurpose->save();
            $Leave_purpose_id = $leavePurpose->id;
        } else {
            $Leave_purpose_id = $request->emp_Leave_purpose_id;
        }

        $leave = new EmployeeLeave();
        $leave->employee_id = $request->employee_id;
        $leave->emp_Leave_purpose_id = $Leave_purpose_id;
        $leave->start_date = date('Y-m-d', strtotime($request->start_date));
        $leave->end_date = date('Y-m-d', strtotime($request->end_date));
        $leave->save();


        $notification = [
            'message' => 'Employee Leave Added successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view_employees_leave')->with($notification);
    }


    public function EmployeeLeaveEdith($id)
    {

        $data['empl_id'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype', 'Employee')->get();
        $data['Purposes'] = EmployeeLeavePurpose::all();

        return  view('backend.employees.employees_leave.employee_leave_edith', $data);
    }



    public function EmployeeLeaveUpdate(Request $request, $id)
    {
        if ($request->emp_Leave_purpose_id == '0') {

            $leavePurpose = new EmployeeLeavePurpose();
            $leavePurpose->leave_purpose  = $request->name;
            $leavePurpose->save();
            $Leave_purpose_id = $leavePurpose->id;
        } else {
            $Leave_purpose_id = $request->emp_Leave_purpose_id;
        }

        $leave =  EmployeeLeave::find($id);
        $leave->employee_id = $request->employee_id;
        $leave->emp_Leave_purpose_id = $Leave_purpose_id;
        $leave->start_date = date('Y-m-d', strtotime($request->start_date));
        $leave->end_date = date('Y-m-d', strtotime($request->end_date));
        $leave->save();


        $notification = [
            'message' => 'Employee Leave Updated successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view_employees_leave')->with($notification);
    }


    public function EmployeeLeaveDel($id)
    {
        $empl_id = EmployeeLeave::find($id)->delete();

        $notification = [
            'message' => 'Employee Leave Deleted successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view_employees_leave')->with($notification);
    }
}