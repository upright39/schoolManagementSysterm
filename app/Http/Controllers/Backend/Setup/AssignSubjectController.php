<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\StudentSubjet;

class AssignSubjectController extends Controller
{
    public function veiwAssignSubject()
    {
        $data['assignData'] = AssignSubject::select('student_class_id')->GroupBy('student_class_id')->get();

        return view('backend.setup.assign_subject.view_assign_subject', $data);
    }


    public function addAssignSubject()
    {
        $data['studentClass'] = StudentClass::all();
        $data['studentSubject'] = StudentSubjet::all();

        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }

    public function storeAssignSubject(Request $request)
    {
        $subjectCount = count($request->subject_id);

        if ($subjectCount != NULL) {

            for ($i = 0; $i < $subjectCount; $i++) {

                $AssigSub = new AssignSubject();
                $AssigSub->student_class_id = $request->class_id;
                $AssigSub->student_subject_id = $request->subject_id[$i];
                $AssigSub->full_mark = $request->full_mark[$i];
                $AssigSub->pass_mark = $request->pass_mark[$i];
                $AssigSub->fail_mark = $request->fail_mark[$i];
                $AssigSub->save();
            }
        }
        $notification = [
            'message' => 'summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.assign.subject')->with($notification);
    }


    public function edithAssignSubject($student_class_id)
    {

        $data['ediths'] = AssignSubject::where('student_class_id', $student_class_id)->orderBy('student_subject_id', 'asc')->get();


        $data['Subjects'] = StudentSubjet::all();
        $data['studentClass'] = StudentClass::all();


        return view('backend.setup.assign_subject.edith_assign_subject', $data);
    }




    public function UpdateAssignSubject(Request $request, $student_class_id)
    {
        if ($request->student_subject_id == NULL) {

            $notification = [
                'message' => 'please  Update the Subject First',
                'alert-type' => 'error'
            ];

            return redirect()->route('edith.asign.subject', $student_class_id)->with($notification);
        } else {

            AssignSubject::where('student_class_id', $student_class_id)->delete();

            $subjectCount = count($request->student_subject_id);

            for ($i = 0; $i < $subjectCount; $i++) {

                $AssigSub = new AssignSubject();
                $AssigSub->student_class_id = $request->student_class_id;
                $AssigSub->student_subject_id = $request->student_subject_id[$i];
                $AssigSub->full_mark = $request->full_mark[$i];
                $AssigSub->pass_mark = $request->pass_mark[$i];
                $AssigSub->fail_mark = $request->fail_mark[$i];
                $AssigSub->save();
            }
        }

        $notification = [
            'message' => 'Assign Subject Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view.assign.subject')->with($notification);
    }



    public function detailsAssignSubject($student_class_id)
    {

        $data['details'] = AssignSubject::where('student_class_id', $student_class_id)->orderBy('student_subject_id', 'asc')->get();

        return view('backend.setup.assign_subject.detail_assign_subject', $data);
    }
}