<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeCategory;

class StudentFeeCategoryController extends Controller
{
    public function veiwStudentFeeCategory()

    {
        $data['FeeCategory'] = StudentFeeCategory::all();

        return view('backend.setup.student_fee_category.view_student_fee_category', $data);
    }

    public function addStudentFeeCategory()
    {
        return view('backend.setup.student_fee_category.add_student_fee_category');
    }


    public function storeStudentFeeCategory(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:student_fee_categories,name'
        ]);

        $class =  new StudentFeeCategory();
        $class->name = $request->name;
        $class->save();


        $notification = [
            'message' => ' Fee category summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.feecategory')->with($notification);
    }





    public function edithStudentFeeCatigory($id)
    {
        $fee_category =  StudentFeeCategory::find($id);
        return view('backend.setup.student_fee_category.edith_student_fee_category', compact('fee_category'));
    }

    public function updateStudentFeeCategory(Request $request, $id)

    {
        $updateCat = StudentFeeCategory::find($id);

        $validate = $request->validate([
            'name' => 'required|unique:student_fee_categories,name,' . $updateCat->id
        ]);


        $updateCat->name = $request->name;
        $updateCat->save();

        $notification = [
            'message' => 'Category Updated  successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.feecategory')->with($notification);
    }



    public function deleteStudentFeeCategory($id)
    {
        $delete = StudentFeeCategory::find($id);
        $delete->delete();

        $notification = [
            'message' => 'Group Deleted  successfully',
            'alert-type' => 'error'
        ];
        return redirect()->route('view.feecategory')->with($notification);
    }
}