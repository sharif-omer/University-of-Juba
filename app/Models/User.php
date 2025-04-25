<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\AssignGrade;
use App\Models\Submission;
use App\Models\Notification;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function lecturer()
    {
        return $this->hasOne(Lecturer::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function gradedSubmissions()
    {
        return $this->hasMany(AssignGrade::class, 'lecturer_id');
    }

    public function assignments()
    {
        return $this->belongsToMany(Assignment::class,'assignment_students', 'student_id', 'assignment_id')->withPivot('answer', 'grade')->withTimestamps();
    }
    // public function assignedTasks()
    // {
    //     return $this->belongsToMany(Assignment::class,'assignment_students', 'student_id', 'assignment_id')->withPivot('answer', 'grade')->withTimestamps();
    // }

    public function submissions()
    {
        return $this->hasMany(Submission::class, 'student_id');
    }

    public function createdAssignments()
    {
        return $this->hasMany(Assignment::class, 'lecturer_id');
    }

    // public function notifications()
        
    // {
    //     return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');
    // }

    // public function unreadNotifications()
        
    // {
    //     return $this->morphMany(Notification::class, 'notifiable')->whereNull('read_at')->orderBy('created_at', 'desc');
    // }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
