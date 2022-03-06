<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

// use phpDocumentor\Reflection\Types\Null_;

class FeeCategoryAmountController extends Controller
{
    public function veiwFeeAmount()
    {
        $data['feeAmount'] = FeeCategoryAmount::select('student_fee_category_id')->GroupBy('student_fee_category_id')->get();

        return view('backend.setup.student_fee_category_amount.view_amount_category', $data);
    }


    public function addFeeAmount()
    {
        $data['feeCategory'] = StudentFeeCategory::all();
        $data['studentClass'] = StudentClass::all();

        return view('backend.setup.student_fee_category_amount.add_amount_category', $data);
    }

    public function storeFeeAmount(Request $request)
    {
        $feeAmount = count($request->class_id);

        if ($feeAmount != NULL) {

            for ($i = 0; $i < $feeAmount; $i++) {

                $Amount = new FeeCategoryAmount();
                $Amount->student_fee_category_id = $request->feecategory_id;
                $Amount->student_class_id = $request->class_id[$i];
                $Amount->amount = $request->amount[$i];
                $Amount->save();
            }
        }
        $notification = [
            'message' => ' Fee amount summited successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('view.feecategoryamount')->with($notification);
    }

    public function edithFeeAmount($feecategory_id)
    {

        $data['edith_amount'] = FeeCategoryAmount::where('student_fee_category_id', $feecategory_id)->orderBy('student_class_id', 'asc')->get();


        $data['feeCategory'] = StudentFeeCategory::all();
        $data['studentClass'] = StudentClass::all();



        return view('backend.setup.student_fee_category_amount.edith_amount_category', $data);
    }


    public function updateFeeAmount(Request $request, $feecategory_id)
    {
        if ($request->class_id == NULL) {

            $notification = [
                'message' => 'please  Update the Class First',
                'alert-type' => 'error'
            ];

            return redirect()->route('edith.amount', $feecategory_id)->with($notification);
        } else {

            FeeCategoryAmount::where('student_fee_category_id', $feecategory_id)->delete();

            $feeAmount = count($request->class_id);

            for ($i = 0; $i < $feeAmount; $i++) {

                $Amount = new FeeCategoryAmount();
                $Amount->student_fee_category_id = $request->feecategory_id;
                $Amount->student_class_id = $request->class_id[$i];
                $Amount->amount = $request->amount[$i];
                $Amount->save();
            }
        }

        $notification = [
            'message' => ' class Amount Updatted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('view.feecategoryamount')->with($notification);
    }



    public function detailsFeeAmount($feecategory_id)
    {

        $data['details_amount'] = FeeCategoryAmount::where('student_fee_category_id', $feecategory_id)->orderBy('student_class_id', 'asc')->get();

        return view('backend.setup.student_fee_category_amount.details_amount_category', $data);
    }
}