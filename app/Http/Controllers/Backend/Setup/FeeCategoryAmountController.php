<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use Illuminate\Http\Request;

class FeeCategoryAmountController extends Controller
{
    public function veiwFeeAmount()
    {
        $data['feeAmount'] = FeeCategoryAmount::all();

        return view('backend.setup.student_fee_category_amount.view_amount_category', $data);
    }


    public function addFeeAmount()
    {
        $data['feeCategory'] = StudentFeeCategory::all();
        $data['studentClass'] = StudentClass::all();

        return view('backend.setup.student_fee_category_amount.add_amount_category', $data);
    }
}