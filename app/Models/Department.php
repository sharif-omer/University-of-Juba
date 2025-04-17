<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Student;


class department extends Model
{
    protected $fillable = [
        'department_name',
    ];

    public function student()
    {
        return 
        $this->hasMany(Student::class);
    }
}
