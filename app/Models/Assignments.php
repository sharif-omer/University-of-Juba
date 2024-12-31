<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignments extends Model
{
    protected $fillable = [
        'course_code',
        'assignment_file',
    ];
}
