<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Submission;

class assignGrade extends Model
{
    protected $fillable = ['submission_id', 'grade', 'feedback'];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }
}
