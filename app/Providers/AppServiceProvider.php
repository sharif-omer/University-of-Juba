<?php

namespace App\Providers;

use App\Models\Lecturer; // Git Lecturers Model 
use App\Models\Student; // Git Students Model
use App\Models\Course; // Git Courses Model
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


public function boot(): void
{

    Route::middleware([
     'role:admin', 'role:lecturer', 'role:student'
    ])->group(function(){
        require
        base_path('routes/web.php');
    });


    View::share([
        'studentCount' => Schema::hasTable('students') ? Student::count() : 0,
        'lecturerCount' => Schema::hasTable('lecturers') ? Lecturer::count() : 0,
        'courseCount' => Schema::hasTable('courses') ? Course::count() : 0,
    ]);
}
}
