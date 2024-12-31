<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use app\Models\Lecturer;
use app\Models\Student;
use app\Models\Results;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Courses extends Model
{
    protected $fillable = [
        'course_name',
        'course_code',
        'credit_hours',
        'fuculty',
        'deparment',
        'semester',
    ];
    public function lecturer()
    {
        return
        $this->belongsTo(Lecturer::class);
    }
    public function lectureres()
    {
        return
        $this->hasMany(Lecturer::class);
    }
    
    public function student()
    {
        return
        $this->belongsToMany(Student::class);
    }
    public function result()
    {
        return
        $this->HasMany(Results::class);
    }
}
