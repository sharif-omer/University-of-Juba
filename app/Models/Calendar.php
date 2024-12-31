<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'event_type',
        'academic_year',
        'semester',
    ];
}
