<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\StudentShift;

class StudentShiftController extends Controller
{

    public function veiwStudentShift()

    {
        $data['studentShift'] = StudentShift::all();

        return view('backend.setup.student_shift.view_student_shift', $data);
    }

    public function addStudentShift()
    {
        return view('backend.setup.student_shift.add_student_shift');
    }


    public function storeStudentShift(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ]);

        $class =  new StudentShift();
        $class->name = $request->name;
        $class->save();


        $notification = [
            'message' => 'shift summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.shift')->with($notification);
    }





    public function edithStudentShift($id)
    {
        $shift =  StudentShift::find($id);
        return view('backend.setup.student_shift.edith_student_shift', compact('shift'));
    }





    public function UpdateStudentShift(Request $request, $id)

    {
        $update = StudentShift::find($id);

        $validate = $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $update->id
        ]);


        $update->name = $request->name;
        $update->save();

        $notification = [
            'message' => 'Shift Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.shift')->with($notification);
    }




    public function deleteStudentShift($id)
    {
        $delete = StudentShift::find($id);
        $delete->delete();

        $notification = [
            'message' => 'Group Deleted  successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view.shift')->with($notification);
    }
}