<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Coursescontroller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\HTTp\Middleware\admin;
use App\HTTp\Middleware\lecturer;


/* ===== Students Route Route ===== */
Route::get('/student/results', [StudentController::class, 'showResults'])->name('student.results');
Route::get('/student/assignments', [StudentController::class, 'showAssignments'])->name('student.assignments');
Route::post('/student/assignments', [StudentController::class, 'submitAssignment'])->name('student.submitAssignment');
Route::get('/student/calendar', [StudentController::class, 'showCalendar'])->name('student.calendar');
Route::get('/student/notifications', [StudentController::class, 'showNotifications'])->name('student.notifications');
Route::get('/student/support', [StudentController::class, 'showSupport'])->name('student.support');
Route::post('/student/support', [StudentController::class, 'submitSupport'])->name('student.submitSupport');


/* ===== lecturer Route ===== */
// Route::middleware(['auth', 'role:lecturer'])->group(function () {
// Route::get('/lecturer/dashboard', [LecturerController::class, 'dashboard'])->name('lecturer.dashboard');
Route::get('/lecturer/courses', [LecturerController::class, 'viewCourses'])->name('lecturer.courses');
Route::post('/lecturer/courses', [LecturerController::class, 'addCourse'])->name('lecturer.addCourse');

Route::get('/lecturer/results', [LecturerController::class, 'viewResults'])->name('lecturer.results');
Route::post('/lecturer/results', [LecturerController::class, 'addResult'])->name('lecturer.addResult');

Route::get('/lecturer/assignments', [LecturerController::class, 'viewAssignments'])->name('lecturer.assignments');
Route::post('/lecturer/assignments', [LecturerController::class, 'addAssignment'])->name('lecturer.addAssignment');

Route::get('/lecturer/notifications', [LecturerController::class, 'viewNotifications'])->name('lecturer.notifications');
Route::post('/lecturer/notifications', [LecturerController::class, 'addNotification'])->name('lecturer.addNotification');



Route::get('/', function () {
    return view('auth.login');
});

/* ===== Users Role Route ===== */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'roleMiddleware:admin'])->name('dashboard');

Route::get('/lecturer/dashboard', function () {
    return view('lecturers_dashboard');
})->middleware(['auth', 'verified', 'roleMiddleware:lecturer'])->name('lecturer');

Route::get('/student/dashboard', function () {
    return view('students_dashboard');
})->middleware(['auth', 'verified', 'roleMiddleware:student'])->name('student');

/* ===== Modify Froile Route ===== */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* ===== Start Lecturers Route ===== */
Route::resource('/dashboard/lecturer', LecturerController::class);
/* ===== End Lecturers Route ===== */

/* ===== Start Student Route ===== */
Route::resource('/dashboard/student', StudentController::class);
/* ===== End Student Route ===== */

/* ===== Start Calendar Route ===== */
Route::resource('/dashboard/calendar', CalendarController::class);
/* ===== End Calendar Route ===== */

/* ===== Start Course Route ===== */
Route::resource('/dashboard/course', Coursescontroller::class);
/* ===== End Course Route ===== */


require __DIR__.'/auth.php';
