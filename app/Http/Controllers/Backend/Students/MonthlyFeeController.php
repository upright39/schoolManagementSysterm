<?php

namespace App\Http\Controllers\Backend\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\AssignStudent;
use App\Models\FeeCategoryAmount;
use  PDF;

class MonthlyFeeController extends Controller
{
    public function VeiwMonthlyFee()
    {
        $data['Years'] = StudentYear::all();
        $data['Classes'] = StudentClass::all();

        return view('backend.students.monthly_fee.view_monthly_fee', $data);
    }



    public function GetMonthlyPaylist(Request $request)
    {
        $year_id = $request->student_year_id;
        $class_id = $request->student_class_id;

        if ($year_id != '') {
            $where[] = ['student_year_id', 'like', $year_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['student_class_id', 'like', $class_id . '%'];
        }
        $allStudent = AssignStudent::with(['st_discount_id'])->where($where)->get();
        //  dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Monthly Fee</th>';
        $html['thsource'] .= '<th>Discount</th>';
        $html['thsource'] .= '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Action</th>';


        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('student_fee_category_id', '3')->where('student_class_id', $v->student_class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v->roll . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $registrationfee->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $v['st_discount_id']['discount'] . '%' . '</td>';

            $originalfee = $registrationfee->amount;
            $discount = $v['st_discount_id']['discount'];
            $discounttablefee = $discount / 100 * $originalfee;
            $finalfee = (float)$originalfee - (float)$discounttablefee;

            $html[$key]['tdsource'] .= '<td>' . $finalfee . '#' . '</td>';
            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-sm btn-' . $color . '" title="PaySlip" target="_blanks" href="' . route("monthly.fee.payslip") . '?class_id=' . $v->student_class_id . '&student_id=' . $v->student_id . '&month=' . $request->month . '">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    } // end method 




    public function GetMonthlyPayslips(Request $request)
    {


        $student_id = $request->student_id;
        $class_id = $request->class_id;
        $allDetails['month'] = $request->month;


        $allDetails['details'] = AssignStudent::with(['student', 'st_discount_id'])->where('student_id', $student_id)->where('student_class_id',  $class_id)->first();

        $pdf = PDF::loadView('backend.students.monthly_fee.print_monthly_fee', $allDetails);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}