<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Department;
use app\Models\Results;
use app\Models\User;
use app\Models\Courses;

class student extends Model
{
    protected $fillable = [
        'name',
        'student_id',
        'enrollment_year',
        'faculty',
        'semester',
        'year',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsToMany(Courses::class);
    }

    public function result()
    {
        return $this->hasMany(Results::class);
    }

    use HasFactory;
    // public function department()
    //  {
    //   return 
    //   $this->belongsTo(Department::class);
    // }
    
}


