<?php

namespace App\Http\Controllers\Backend\Students;

use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentRegController extends Controller
{
    //

    public function studentRegVeiw()
    {

        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $data['student_year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['student_class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;


        $data['allData'] = AssignStudent::where('student_year_id', $data['student_year_id'])->where('student_class_id', $data['student_class_id'])->get();

        return view(' backend.students.student_registration.view_student_reg', $data);
    }


    public function SearchYearClass(Request $request)
    {
        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $request_year = $request->student_year_id;
        $request_class = $request->student_class_id;


        $data['allData'] = AssignStudent::where('student_year_id', $request_year)->where('student_class_id', $request_class)->get();

        return view(' backend.students.student_registration.view_student_reg', $data);
    }






    public function addstudentReg()
    {
        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $data['Groups'] = StudentGroup::all();
        $data['Shifts'] = StudentShift::all();
        $data['AssignSub'] = AssignStudent::all();
        return view(' backend.students.student_registration.add_student_reg', $data);
    }


    public function storeStudentReg(Request $request)
    {
        DB::transaction(function () use ($request) {

            $checkYear = StudentYear::find($request->student_year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();

            if ($student == null) {

                $firistReg = 0;
                $studentId = $firistReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;

                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } // end else 


            $final_id_no = $checkYear . '/' . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no =  $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));


            if ($request->file('image')) {

                $file = $request->file('image');
                $file_name = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/students_images'), $file_name);
                $user->image = $file_name;
            }

            $user->save();



            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->student_class_id = $request->student_class_id;
            $assign_student->student_year_id = $request->student_year_id;
            $assign_student->student_group_id = $request->student_group_id;
            $assign_student->student_shift_id = $request->student_shift_id;
            $assign_student->save();




            $discount_students = new DiscountStudent();
            $discount_students->assign_student_id = $assign_student->id;
            $discount_students->fee_category_id = '1';
            $discount_students->discount = $request->discount;
            $discount_students->save();
        });

        $notification = [
            'message' => 'Student Registration Insertted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view_students_reg')->with($notification);
    }




    public function StudentRegEdith($student_id)
    {

        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $data['Groups'] = StudentGroup::all();
        $data['Shifts'] = StudentShift::all();

        $data['AssignSub'] = AssignStudent::with('student', 'st_discount_id')->where('student_id', $student_id)->first();


        return view(' backend.students.student_registration.edith_student_reg', $data);
    }





    public function updateStudentReg(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {

            $user =  User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));


            if ($request->file('image')) {
                @unlink(public_path('uploads/students_images/' . $user->image));
                $file = $request->file('image');
                $file_name = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/students_images'), $file_name);
                $user->image = $file_name;
            }
            $user->save();



            $assign_student =  AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();

            $assign_student->student_class_id = $request->student_class_id;
            $assign_student->student_year_id = $request->student_year_id;
            $assign_student->student_group_id = $request->student_group_id;
            $assign_student->student_shift_id = $request->student_shift_id;
            $assign_student->save();


            $discount_students =  DiscountStudent::where('assign_student_id', $request->id)->first();
            $discount_students->discount = $request->discount;
            $discount_students->save();
        });

        $notification = [
            'message' => 'Student Registration Updated  successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view_students_reg')->with($notification);
    }



    public function PromoteStudent($student_id)
    {

        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();
        $data['Groups'] = StudentGroup::all();
        $data['Shifts'] = StudentShift::all();

        $data['AssignSub'] = AssignStudent::with('student', 'st_discount_id')->where('student_id', $student_id)->first();


        return view(' backend.students.student_registration.promote_student', $data);
    }


    public function StorePromoteStudent(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {

            $user =  User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));


            if ($request->file('image')) {
                @unlink(public_path('uploads/students_images/' . $user->image));
                $file = $request->file('image');
                $file_name = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('uploads/students_images'), $file_name);
                $user->image = $file_name;
            }
            $user->save();



            $assign_student = new AssignStudent();;

            $assign_student->student_id = $student_id;
            $assign_student->student_class_id = $request->student_class_id;
            $assign_student->student_year_id = $request->student_year_id;
            $assign_student->student_group_id = $request->student_group_id;
            $assign_student->student_shift_id = $request->student_shift_id;
            $assign_student->save();


            $discount_students = new DiscountStudent();
            $discount_students->assign_student_id = $assign_student->id;
            $discount_students->fee_category_id = '1';
            $discount_students->discount = $request->discount;
            $discount_students->save();
        });

        $notification = [
            'message' => 'Student Promotion Submitted  successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view_students_reg')->with($notification);
    }
}