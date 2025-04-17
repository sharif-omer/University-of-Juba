<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Semester;

class Result extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'semester',
        'marks',
        'grade',
        
    ];

    public function lecturer()
    {
        return
        $this->belongsTo(Lecturer::class);
    }

    public function student()
    {
        return
        $this->belongsTo(Student::class);
    }

    public function course()
    {
        return
        $this->belongsTo(Course::class);
    }

    public function semester()
    {
        return
        $this->belongsTo(Semester::class);
    }
}
