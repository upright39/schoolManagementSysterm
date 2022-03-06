<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentExamType;

class StudentExamTypeController extends Controller
{
    public function veiwStudentExamType()

    {
        $data['student_examtype'] = StudentExamType::all();

        return view('backend.setup.student_exam_type.view_exam_type', $data);
    }

    public function addStudentExamType()
    {
        return view('backend.setup.student_exam_type.add_exam_type');
    }


    public function storeStudentExamType(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_exam_types,name'
        ]);

        $examType =  new StudentExamType();
        $examType->name = $request->name;
        $examType->save();


        $notification = [
            'message' => 'Exam type summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.exam.type')->with($notification);
    }





    public function edithStudentExamType($id)
    {
        $ediths =  StudentExamType::find($id);
        return view('backend.setup.student_exam_type.edith_exam_type', compact('ediths'));
    }

    public function updateStudentExamType(Request $request, $id)

    {
        $update = StudentExamType::find($id);

        $validate = $request->validate([
            'name' => 'required|unique:student_exam_types,name,' . $update->id
        ]);


        $update->name = $request->name;
        $update->save();

        $notification = [
            'message' => 'ExanType Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.exam.type')->with($notification);
    }



    public function deleteStudentExamType($id)
    {
        $delete = StudentExamType::find($id);
        $delete->delete();

        $notification = [
            'message' => ' Deleted  successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view.exam.type')->with($notification);
    }
}