<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Submission;

class AssignmentGrade extends Model
{
    protected $fillable = ['submission_id', 'grade', 'feedback'];

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

}
