<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use app\Models\Department;
use App\Models\Result;
use App\Models\User;
use App\Models\Course;


class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'student_id',
        'faculty',
        'departments',
        'current_semester',
        'current_year',
        'enrollment_year',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    // public function department()
    //  {
    //   return 
    //   $this->belongsTo(Department::class);
    // }
    
}


