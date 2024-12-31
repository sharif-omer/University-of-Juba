<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $fillable = [
        'student_id',
        'course_code',
        'grade',
    ];
}
