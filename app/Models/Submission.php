<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Assignment;
use app\Models\Student;
use App\Models\AssignGrade;
use app\Models\AssignmentGrade;

class Submission extends Model
{
    protected $fillable = [
        'answers',
        'assignment_id',
        'student_id',
        'grade',
        'feedback',
        'graded_at',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function grade()
    {
        return $this->hasOne(AssignmentGrade::class,);
    }
    public function assignGrade()
    {
        return $this->hasOne(AssignGrade::class,);
    }
    public function isGraded()
    {
        return !is_null($this->grades_at);
    }
}
