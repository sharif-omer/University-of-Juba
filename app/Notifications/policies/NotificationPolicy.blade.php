<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
     if ($user->isAdmin()) {
        return true;
     }
    }
    public function createForLecturers(User $user)
    {
        return $user->isAdmin(); // Amin only
    }

    public function createForStudents(User $user)
    {
        return $user->isAdmin(); || $uer->isLecturer();; // Admin and Lecturers
    }
    public function sendToLecturers(User $user)
    {
        return $user->isAdmin(); // Admin Only
    }
    public function sendToStudents(User $user)
    {
        return $user->isAdmin(); || $uer->isLecturer();; // Admin and Lecturers
    }
}