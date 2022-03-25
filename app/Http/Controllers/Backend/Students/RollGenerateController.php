<?php

namespace App\Http\Controllers\Backend\Students;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use App\Models\DiscountStudent;
use Illuminate\Support\Facades\DB;

class RollGenerateController extends Controller

{
    public function VeiwRollGenerate()
    {
        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();

        return view('backend.students.roll_generator.view_roll_genetrate', $data);
    }

    public function GetStudents(Request $request)
    {
        $allDate = AssignStudent::with('student')->where('student_class_id', $request->student_class_id)->where('student_year_id', $request->student_year_id)->get();
        // dd($allDate->toArray());

        return response()->json($allDate);
    }



    public function StoreRollGenerate(Request $request)
    {
        $year_id = $request->student_year_id;
        $class_id = $request->student_class_id;

        if ($request->student_id != null) {


            for ($i = 0; $i < count($request->student_id); $i++) {

                AssignStudent::where('student_year_id', $year_id)->where('student_class_id', $class_id)->where('student_id', $request->student_id[$i])->update(['roll' => $request->roll[$i]]);
            }
        } else {
            $notification = [
                'message' => 'Sorry there is no Student',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

        $notification = [
            'message' => 'Roll Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view_roll_generate')->with($notification);
    }
}