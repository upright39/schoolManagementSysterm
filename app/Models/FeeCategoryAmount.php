<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;

    public function fee_category()
    {
        return $this->belongsTo(StudentFeeCategory::class, 'student_fee_category_id', 'id');
    }
    public function class_category()
    {
        return $this->belongsTo(StudentClass::class, 'student_class_id', 'id');
    }
}