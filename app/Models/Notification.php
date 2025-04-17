<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'title',
        'message',
        'target',
        'is_read',
        'sender_id',
    ];

    public function sender()
     {
       return $this->belongsTo(User::class, 'sender_id');
    }
    // protected $casts = [
    //     'data' => 'array',
    //     'read_at' => 'datetime',
    // ];

    // public function notifiable()
    // {
    //     return $this->morphTo();
    // }

    // // Function To Know is Notification Read
    // public function isRead()
    // {
    //     return $this->read_at !== null;
    // }

    // // Function To Know is Notification not Read
    // public function isUnread()
    // {
    //     return $this->read_at === null;
    // }
}