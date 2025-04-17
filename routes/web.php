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
// Route::middleware(['auth'])->group(function()){
//  Route::get('/student/{student}/results/', [StudentController::class, 'showResults'])->name('students.results.showe');
// };

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
// Route::middleware(['auth', 'role:lecturer'])->group(function () {
// Route::get('/lecturer/dashboard', [LecturerController::class, 'dashboard'])->name('lecturer.dashboard');
Route::get('/lecturer/courses', [LecturerController::class, 'viewCourses'])->name('lecturer.courses');
Route::post('/lecturer/courses', [LecturerController::class, 'addCourse'])->name('lecturer.addCourse');

// Route::post('/lecturer/results', [LecturerController::class, 'create-results'])->name('lecturer.addResult');
// Route::get('/lecturer/results', [LecturerController::class, 'viewResults'])->name('lecturer.results');

// Route::get('/lecturer/editResult', [LecturerController::class, 'editResult'])->name('results.edit');
// Route::post('/lecturer/results', [LecturerController::class, 'updatResult'])->name('results.updat');

Route::get('/lecturer/assignments', [LecturerController::class, 'viewAssignments'])->name('lecturer.assignments');
Route::post('/lecturer/assignments', [LecturerController::class, 'addAssignment'])->name('lecturer.addAssignment');

Route::get('/lecturer/notifications', [LecturerController::class, 'viewNotifications'])->name('lecturer.notifications');
Route::post('/lecturer/notifications', [LecturerController::class, 'addNotification'])->name('lecturer.addNotification');

// Route::resource('/lecturer/Result', LecturerController::class);

// Route::get('/lecturer/Result', function () {
//     return redirect()->route('lecturer.results');
// });


// للأستاذ
// Route::get('results', [ResultController::class, 'index'])->middleware('auth')->name('results.index');
// Route::get('results/{courseId}/semester/{semester}', [ResultController::class, 'enterResults'])->middleware('auth')->name('results.enter');
// Route::post('results/{courseId}/semester/{semester}', [ResultController::class, 'storeResults'])->middleware('auth')->name('results.store');

Route::get('lecturer/results', [ResultController::class, 'index'])->middleware('auth')->name('results.index');
Route::get('lecturer/results/create', [ResultController::class, 'create'])->middleware('auth')->name('results.create');

Route::post('lecturer/results', [ResultController::class, 'store'])->middleware('auth')->name('results.store');
Route::get('lecturer/results/{id}', [ResultController::class, 'show'])->middleware('auth')->name('results.show');

Route::get('lecturer/results/{id}', [ResultController::class, 'edit'])->middleware('auth')->name('results.edit');
Route::put('lecturer/results/{id}', [ResultController::class, 'update'])->middleware('auth')->name('results.update');
Route::delete('lecturer/results/{id}', [ResultController::class, 'destroy'])->middleware('auth')->name('results.destroy');

// Route::update('lecturer/results/{id}', [ResultController::class, 'update'])->middleware('auth')->name('results.update');
// Route::get('results', [ResultController::class, 'enterResults'])->middleware('auth')->name('results.enter');
// Route::get('results/show', [ResultController::class, 'showResults'])->middleware('auth')->name('showResults');
// Route::post('results', [ResultController::class, 'storeResults'])->middleware('auth')->name('results.store');


// Route::middleware(['auth', 'role:professor'])->group(function () {
    // Route::get('/results/create', [ResultController::class, 'enterResults']);
    // Route::post('/results', [ResultController::class, 'storeResults']);
//});


// للطالب
// Route::get('my-results', [ResultController::class, 'studentResults'])->middleware('auth')->name('results.student');

// Route::resource('/lecturer/results', ResultController::class);

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

// Route::middleware(['auth', 'role:0'])->get('/student/create',[StudentController::class, 'create'])->name('students.create');
// Route::post('/student',[StudentController::class, 'store'])->name('student.store');
/* ===== End Student Route ===== */

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

    // Route::post('lecturer/submissions/{submission}/grade', [AssignGradeController::class, 'create'])
    //     ->name('gradings.create');
    // Route::post('lecturer/submissions/{submission}/grade', [AssignGradeController::class, 'store'])
    //     ->name('gradings.store');
// });

// Route::middleware(['role:2'])->group(function () {
  Route::get('student/assignments', [StudentController::class, 'studentAssignments'])->name('student.assignments'); // عرض المهام للطالب
  Route::get('student/assignments/{assignment}', [StudentController::class, 'showAssignment'])->name('student.assignments.show'); // عرض المهام للطالب
  Route::post('assignments/{assignment}/submit', [StudentController::class, 'submitSolution'])->name('assignments.submit'); // تسليم الحل من الطالب
// });
/* ===== Assignment Route ===== */



/* ===== Notification Route ===== */
// Route::middleware(['auth'])->group(function () {
//     Route::prefix('notifications')->group(function () {
//         Route::get('/', [NotificationController::class, 'index'])->name('notifications.index');
//         Route::post('lecturer/notify-lecturers', [NotificationController::class, 'notifyLecturers'])->name('notifications.lecturers');
//         Route::post('/notify-students', [NotificationController::class, 'notifyStudents'])->name('notifications.students');
//         Route::post('/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
//     });
// });

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
    // // إنشاء الإشعارات
    // Route::get('/notifications/create-lecturers', [NotificationController::class, 'createForLecturers'])
    //     ->name('notifications.lecturers.create');
    
    // Route::get('/notifications/create-students', [NotificationController::class, 'createForStudents'])
    //     ->name('notifications.students.create');

    // // إرسال الإشعارات
    // Route::post('/notifications/send-lecturers', [NotificationController::class, 'sendToLecturers'])
    //     ->name('notifications.lecturers.store');
    
    // Route::post('/notifications/send-students', [NotificationController::class, 'sendToStudents'])
        // ->name('notifications.students.store');

    // // إدارة الإشعارات
    // Route::get('/notifications', [NotificationController::class, 'index'])
    //     ->name('notifications.index');
    
    // Route::get('/notifications/{id}', [NotificationController::class, 'show'])
    //     ->name('notifications.show');
    
    // Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])
    //     ->name('notifications.read');
    
    // Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])
    //     ->name('notifications.read.all');
    
    // Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])
    //     ->name('notifications.destroy');
    
    // Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount'])
        // ->name('notifications.unread.count');


require __DIR__.'/auth.php';
