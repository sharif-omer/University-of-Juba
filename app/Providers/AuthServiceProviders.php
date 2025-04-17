<?php

namespace App\Providers;

use App\Models\Notification;
use App\Policies\NotificationPolicy;
use Illuminate\foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProviders extends ServiceProvider
{
    protected $policies = [
        Notification::class => NotificationPolicy::class,
    ];

    public  function boot() 
    {
        $this->registerPolicies();
    }
}