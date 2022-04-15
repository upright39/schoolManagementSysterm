<?php

namespace App\Http\Controllers\Backend\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeSalarylog;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use  PDF;

class EmployeeRegController extends Controller
{
    public function veiwEmployee()
    {
        $allData['employees'] = User::where('usertype', 'Employee')->get();

        return view('backend.employees.employees_reg.view_employees', $allData);
    }


    public function addEmployee()
    {


        $allData['Designations'] = Designation::all();

        return view('backend.employees.employees_reg.add_employees', $allData);
    }


    public function storeEmployee(Request $request)
    {
        DB::transaction(function () use ($request) {

            $checkYear = date('Ym', strtotime($request->join_date));

            $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first();

            if ($employee == null) {

                $firistReg = 0;
                $employeeId = $firistReg + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            } else {
                $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee + 1;

                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            } // end else 


            $final_id_no = $checkYear . '/' . $id_no;

            $user = new User();
            $user->id_no =  $final_id_no;
            $user->password = bcrypt(rand(0000, 9999));
            $user->usertype = 'Employee';
            $user->code = rand(0000, 9999);
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->designation_id = $request->designation_id;
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            $user->salary = $request->salary;



            if ($request->file('image')) {

                $file = $request->file('image');
                $file_name = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/employee_images'), $file_name);
                $user->image = $file_name;
            }

            $user->save();



            $assign_employee = new EmployeeSalarylog();
            $assign_employee->employee_id = $user->id;
            $assign_employee->previous_salary     = $request->salary;
            $assign_employee->present_salary     = $request->salary;
            $assign_employee->increment_salary     = '0';
            $assign_employee->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $assign_employee->save();
        });

        $notification = [
            'message' => 'Employee Registration Insertted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view_employees_reg')->with($notification);
    }


    public function EdithEmployee($id)
    {
        $allData['employees'] = User::find($id);

        $allData['Designations'] = Designation::all();
        return view('backend.employees.employees_reg.edith_employees', $allData);
    }





    public function StoreEmployees(Request $request, $id)
    {

        $user =  User::find($id);
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->dob = date('Y-m-d', strtotime($request->dob));
        $user->designation_id = $request->designation_id;


        if ($request->file('image')) {

            $file = $request->file('image');
            @unlink(public_path('uploads/employee_images/' . $user->image));
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/employee_images'), $file_name);
            $user->image = $file_name;
        }

        $user->save();

        $notification = [
            'message' => 'Employee Registration Updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view_employees_reg')->with($notification);
    }

    public function DetailsEmployee($id)
    {
        $data['Details'] = User::find($id);

        $pdf = PDF::loadView('backend.employees.employees_reg.employees_details', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}