<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function veiwStudentGroup()

    {
        $data['studentGroup'] = StudentGroup::all();

        return view('backend.setup.student_group.view_student_group', $data);
    }

    public function addStudentGroup()
    {
        return view('backend.setup.student_group.add_student_group');
    }


    public function storeStudentGroup(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ]);

        $class =  new StudentGroup();
        $class->name = $request->name;
        $class->save();


        $notification = [
            'message' => 'group summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.group')->with($notification);
    }





    public function edithStudentGroup($id)
    {
        $group =  StudentGroup::find($id);
        return view('backend.setup.student_group.edith_student_group', compact('group'));
    }

    public function updateStudentGroup(Request $request, $id)

    {
        $updategroup = StudentGroup::find($id);

        $validate = $request->validate([
            'name' => 'required|unique:student_classes,name,' . $updategroup->id
        ]);


        $updategroup->name = $request->name;
        $updategroup->save();

        $notification = [
            'message' => 'Group Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.group')->with($notification);
    }



    public function deleteStudentGroup($id)
    {
        $delete = StudentGroup::find($id);
        $delete->delete();

        $notification = [
            'message' => 'Group Deleted  successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view.group')->with($notification);
    }
}