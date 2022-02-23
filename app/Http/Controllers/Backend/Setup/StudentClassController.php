<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;


class StudentClassController extends Controller
{
    public function veiwStudentClass()

    {
        $data['studentClass'] = StudentClass::all();

        return view('backend.setup.student_class.view_student_class', $data);
    }


    public function addStudentClass()
    {
        return view('backend.setup.student_class.add_student_class');
    }


    public function storeStudentClass(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ]);

        $class =  new StudentClass();
        $class->name = $request->name;
        $class->save();


        $notification = [
            'message' => 'Class summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.class')->with($notification);
    }


    public function edithStudentClass($id)
    {
        $class =  StudentClass::find($id);
        return view('backend.setup.student_class.update_student_class', compact('class'));
    }

    public function updateStudentClass(Request $request, $id)

    {
        $updateclass = StudentClass::find($id);

        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name,' . $updateclass->id
        ]);


        $updateclass->name = $request->name;
        $updateclass->save();

        $notification = [
            'message' => 'Class Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.class')->with($notification);
    }



    public function deleteStudentClass($id)
    {
        $delete = StudentClass::find($id);
        $delete->delete();

        $notification = [
            'message' => 'Class Deleted  successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view.class')->with($notification);
    }
}