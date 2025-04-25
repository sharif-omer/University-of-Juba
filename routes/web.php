<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Coursescontroller;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AssignGradeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\HTTp\Middleware\admin;
use App\HTTp\Middleware\lecturer;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Lecturer as ModelsLecturer;

/* ===== Students Route Route ===== */

Route::get('/student/{id}/result/', [StudentController::class, 'getStudentResults']);

Route::get('/student/{student}/results/', [StudentController::class, 'showResults'])->name('students.results.showe')->middleware('auth');
Route::get('/student/assignments', [StudentController::class, 'showAssignments'])->name('student.assignments');
Route::post('/student/assignments', [StudentController::class, 'submitAssignment'])->name('student.submitAssignment');
Route::get('/student/calendar', [StudentController::class, 'showCalendar'])->name('student.calendar');
Route::get('/student/notifications', [StudentController::class, 'showNotifications'])->name('student.notifications');
Route::get('/student/support', [StudentController::class, 'showSupport'])->name('student.support');
Route::post('/student/support', [StudentController::class, 'submitSupport'])->name('student.submitSupport');

Route::post('/student/my-courses', [StudentController::class, 'myCourses'])->name('student.myCourses')->middleware('auth');


/* ===== lecturer Route ===== */

Route::get('/lecturer/courses', [LecturerController::class, 'viewCourses'])->name('lecturer.courses');
Route::post('/lecturer/courses', [LecturerController::class, 'addCourse'])->name('lecturer.addCourse');

Route::get('/lecturer/assignments', [LecturerController::class, 'viewAssignments'])->name('lecturer.assignments');
Route::post('/lecturer/assignments', [LecturerController::class, 'addAssignment'])->name('lecturer.addAssignment');

Route::get('/lecturer/notifications', [LecturerController::class, 'viewNotifications'])->name('lecturer.notifications');
Route::post('/lecturer/notifications', [LecturerController::class, 'addNotification'])->name('lecturer.addNotification');

Route::get('lecturer/results', [ResultController::class, 'index'])->middleware('auth')->name('results.index');
Route::get('lecturer/results/create', [ResultController::class, 'create'])->middleware('auth')->name('results.create');

Route::post('lecturer/results', [ResultController::class, 'store'])->middleware('auth')->name('results.store');
Route::get('lecturer/results/{id}', [ResultController::class, 'show'])->middleware('auth')->name('results.show');

Route::get('lecturer/results/{id}', [ResultController::class, 'edit'])->middleware('auth')->name('results.edit');
Route::put('lecturer/results/{id}', [ResultController::class, 'update'])->middleware('auth')->name('results.update');
Route::delete('lecturer/results/{id}', [ResultController::class, 'destroy'])->middleware('auth')->name('results.destroy');

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

/* ===== Start Calendar Route ===== */
Route::resource('/dashboard/calendar', CalendarController::class);
/* ===== End Calendar Route ===== */

/* ===== Start Course Route ===== */
Route::resource('/dashboard/course', Coursescontroller::class);
/* ===== End Course Route ===== */

/* ===== Assignment Route ===== */
// Route::middleware(['auth'])->group(function () {
//     // Route::middleware(['role:1'])->group(function () {
        Route::get('lecturer/assignments', [AssignmentController::class, 'index'])->name('assignment.index'); // إدارة المهام للأستاذ فقط
        Route::get('lecturer/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create'); // إدارة المهام للأستاذ فقط
        Route::post('lecturer/assignments', [AssignmentController::class, 'store'])->name('assignment.store'); // إدارة المهام للأستاذ فقط
        
        Route::get('lecturer/assignments/{id}', [AssignmentController::class, 'edit'])->name('assignment.edit'); // إدارة المهام للأستاذ فقط
        Route::put('lecturer/assignments/{id}', [AssignmentController::class, 'update'])->name('assignment.update'); // إدارة المهام للأستاذ فقط
        Route::delete('lecturer/assignments/{id}', [AssignmentController::class, 'destroy'])->name('assignment.destroy'); // إدارة المهام للأستاذ فقط
        Route::post('assignments/{assignment}/grade/{student}', [AssignmentController::class, 'gradeSolution'])
            ->name('assignments.grade'); // تصحيح الإجابات من قبل الأستاذ
    // });

// });

// routes/web.php
// Route::middleware(['auth', 'role:1'])->group(function () {
    // ... Routes  
    Route::get('lecturer/assignments/{assignment}/submissions', [AssignmentController::class, 'viewSubmissions'])
        ->name('assignments.submissions');
    Route::get('lecturer/submissions/{submission}', [AssignmentController::class, 'viewSubmission'])
        ->name('submissions.show');
    Route::post('lecturer/submissions/{submission}/grade', [AssignmentController::class, 'gradeSubmission'])
        ->name('submissions.grade');

// Route::middleware(['role:2'])->group(function () {
  Route::get('student/assignments', [StudentController::class, 'studentAssignments'])->name('student.assignments'); // عرض المهام للطالب
  Route::get('student/assignments/{assignment}', [StudentController::class, 'showAssignment'])->name('student.assignments.show'); // عرض المهام للطالب
  Route::post('assignments/{assignment}/submit', [StudentController::class, 'submitSolution'])->name('assignments.submit'); // تسليم الحل من الطالب
// });


/* ===== notifications Route ===== */

Route::middleware(['auth'])->group(function () {

  Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});

Route::middleware(['auth'])->group(function () {

      Route::get('/notifications/all', [NotificationController::class, 'notifications'])->name('notifications.all');

    Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');

    Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
    
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
});
  

require __DIR__.'/auth.php';
