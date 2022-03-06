<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSubjet;

class StudentSubjectController extends Controller
{
    public function veiwStudentSubject()

    {
        $data['subjects'] = StudentSubjet::all();

        return view('backend.setup.student_subject.view_student_subject', $data);
    }

    public function addStudentSubject()
    {
        return view('backend.setup.student_subject.add_student_subject');
    }


    public function storeStudentSubject(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_subjets,name'
        ]);

        $subject =  new StudentSubjet();
        $subject->name = $request->name;
        $subject->save();


        $notification = [
            'message' => 'Subject summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.subject')->with($notification);
    }





    public function edithStudentSubject($id)
    {
        $ediths =  StudentSubjet::find($id);
        return view('backend.setup.student_subject.edith_student_subject', compact('ediths'));
    }

    public function updateStudentSubject(Request $request, $id)

    {
        $update = StudentSubjet::find($id);

        $validate = $request->validate([
            'name' => 'required|unique:student_subjets,name,' . $update->id
        ]);


        $update->name = $request->name;
        $update->save();

        $notification = [
            'message' => 'Subject Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.subject')->with($notification);
    }



    public function deleteStudentSubject($id)
    {
        $delete = StudentSubjet::find($id);
        $delete->delete();

        $notification = [
            'message' => ' Deleted  successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view.subject')->with($notification);
    }
}