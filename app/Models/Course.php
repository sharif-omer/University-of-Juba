<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use app\Models\Lecturer;
use App\Models\Student;
use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        // 'student_id',
        'course_code',
        'credit_hours',
        'fuculty',
        'deparment',
    ];
    public function lecturer()
    {
        return
        $this->belongsTo(Lecturer::class);
    }
    
    public function student()
    {
        return
        $this->belongsToMany(Student::class, 'course_student','student_id', 'course_id');
    }
    public function results()
    {
        return
        $this->HasMany(Result::class);
    }
}
