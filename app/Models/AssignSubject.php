<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    public function class_function()
    {
        return $this->belongsTo(StudentClass::class, 'student_class_id', 'id');
    }
    public function subjectFunction()
    {
        return $this->belongsTo(StudentSubjet::class, 'student_subject_id', 'id');
    }
}
