<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\FacultyDepartment;
use app\Models\Enrollment;
use App\Models\staff;
use app\Models\Course;
use app\Models\Lecturer;
use app\Models\Student;

class FacultyDepartment extends Model
{
    use HasFactory;
    public function department()
    {
        return
        $this->belongsTo(FacultyDepartment::class);
    }
    public function lecturer()
    {
        return
        $this->belongsTo(Lecturer::class);
    }
    public function students()
    {
        return
        $this->belongsToMany(Student::class,'enrollments')->withPivot('grade');
    }
}
