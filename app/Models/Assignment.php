<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Lecturer;
use App\Models\User;
use App\Models\Student;
use App\Models\Submission;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assignment extends Model
{
    protected $fillable = [
        'title',
        'description',
        'deadline',
        'lecturer_id',
    ];

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'assignment_students', 'assignment_id', 'student_id')->withPivot('answer', 'grade')->withTimestamps();
    }
}
