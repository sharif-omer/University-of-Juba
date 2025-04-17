<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Result;

class Semester extends Model
{
    protected $fillable = [
        'name', 
        'start_date', 
        'end_date', 
    ];

    public function results()
    {
        return
        $this->hasMany(Result::class);
    }
}
