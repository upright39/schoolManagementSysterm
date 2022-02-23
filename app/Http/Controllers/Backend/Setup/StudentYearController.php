<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function veiwStudentYear()

    {
        $data['studentYear'] = StudentYear::all();

        return view('backend.setup.student_year.view_student_year', $data);
    }

    public function addStudentYear()
    {
        return view('backend.setup.student_year.add_student_year');
    }


    public function storeStudentYear(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ]);

        $class =  new StudentYear();
        $class->name = $request->name;
        $class->save();


        $notification = [
            'message' => 'Year summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.year')->with($notification);
    }





    public function edithStudentYear($id)
    {
        $year =  StudentYear::find($id);
        return view('backend.setup.student_year.edith_student_year', compact('year'));
    }

    public function updateStudentYear(Request $request, $id)

    {
        $updateclass = StudentYear::find($id);

        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name,' . $updateclass->id
        ]);


        $updateclass->name = $request->name;
        $updateclass->save();

        $notification = [
            'message' => 'Year Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.year')->with($notification);
    }



    public function deleteStudentYear($id)
    {
        $delete = StudentYear::find($id);
        $delete->delete();

        $notification = [
            'message' => 'Year Deleted  successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view.year')->with($notification);
    }
}