<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Courses;
use app\Models\User;

class lecturer extends Model
{
  use HasFactory;

  // protected $fillable = [];
  protected $fillable = [
    'name',
    'email',
    'phone_number',
];
    public function user()
    {
        return
        $this->belongsTo(User::class);
    }

    public function courses()
    {
      return
      $this->hasMany(Courses::class);
    }
    public function course()
    {
      return
      $this->belongsTo(Courses::class);
    }
}
