<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\Course;
use App\Models\Result;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $student = Student::all();
            return view('students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'student_id' => 'required|string|unique:students,student_id',
            'enrollment_year' => 'required',
            'faculty' => 'required',
            'departments' => 'required',
            'current_semester' => 'required',
            'current_year' => 'required',
        ]); 
        $user = User::create([
          'name' => $validatedData['name'],
          'email' => $validatedData['email'],
          'password' => Hash::make($validatedData['password']),
          'role' => 2,
        ]);
       $student  = Student::create([
         'user_id' => $user->id,
         'student_id' => $validatedData['student_id'],
         'enrollment_year' => $validatedData['enrollment_year'],
         'faculty' => $validatedData['faculty'],
         'current_semester' => $validatedData['current_semester'],
         'current_year' => $validatedData['current_year'],
         'departments' => $validatedData['departments'],
        ]);
        return redirect()->route('student.index')->with('success','Student Created Successfully');

}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'student_id' => 'required',
            'enrollment_year' => 'required',
            'faculty' => 'required',
            'departments' => 'required',
            'current_semester' => 'required',
            'current_year' => 'required',
        ]);
        $student = Student::findOrFail($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->student_id = $request->input('student_id');
        $student->enrollment_year = $request->input('enrollment_year');
        $student->faculty = $request->input('faculty');
        $student->departments = $request->input('departments');
        $student->current_semester = $request->input('current_semester');
        $student->current_year = $request->input('current_year');
        $student->save();
        return redirect()->route('student.index')->with('success','student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
    
        $student->delete();
    return redirect()->route('student.index')->with('success','Student Deleted Successfully');

    } // End Method

   

    public function showAssignments()
{
    return view('student.assignments');
}

    public function myCourses()
    {
        $student = Auth::user();

        $courses = $student->course;
    
        return response()->json($courses);
    }
    public function showProfile()
    {
        $profile = [
            'name' => 'John Doe',
            'student_id' => '123456',
            'department' => 'Computer Science',
            'year' => 'Final Year',
        ];
    
        return view('student.profile', compact('profile'));
    }
        // Fetch academic details

    

    public function showSupport()
    {
        // Support page
        return view('student.support');
    }
    
public function submitSupport(Request $request)
{
    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    // Save feedback in the database or send it via email
    return back()->with('success', 'Your feedback has been submitted successfully!');
}

 /**===== About Student Results ====== */
    public function showResults(Student $student)
    {
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $student = $user->student;
        // chek if student
        if(Auth::user()->student->id !== $student->id){
            abort(403); // Unaithorized
        }
       $student->load('results.course');

 
    // جدول تحويل الدرجات إلى نقاط
    $gradePoints = [
        'A' => 4.0,
        'B+' => 3.8,
        'B' => 3.5,
        'C+' => 3.0,
        'C' => 2.5,
        'D+' => 2.0,
        'D' => 1.5,
        'F' => 0.0,
    ];

    // تقسيم النتائج إلى فصلين (يمكن تعديل هذا الجزء حسب هيكل بياناتك)
    $semester1 = $student->results->where('semester', 'first'); // update remove ->toArray()
    $semester2 = $student->results->where('semester', 'second');

    // دالة لحساب المعدل الفصلي
    function calculateSemesterGPA($courses, $gradePoints) {
        $totalWeightedPoints = 0;
        $totalCreditHours = 0;

        foreach ($courses as $course) {
            $grade = $course->grade; // remove []
            $creditHours = $course->course->credit_hours; //remove [''] عدد الساعات المعتمدة من الجدول المرتبط
            if(isset($gradePoints[$grade])) {
                $totalWeightedPoints += $gradePoints[$grade] * $creditHours;
                $totalCreditHours += $creditHours;
            }
            
        }

        return $totalCreditHours > 0 ? $totalWeightedPoints / $totalCreditHours : 0;
    }

    // حساب المعدل الفصلي لكل فصل
    $semester1GPA = calculateSemesterGPA($semester1, $gradePoints);
    $semester2GPA = calculateSemesterGPA($semester2, $gradePoints);

    $totalSemeester1Courses = $semester1->count();
    $totalSemeester2Courses = $semester2->count();
    $totalCourses = $totalSemeester1Courses + $totalSemeester2Courses;

    $cumulativeGPA = 0;
    if($totalCourses > 0) {
      $cumulativeGPA = ($semester1GPA * $totalSemeester1Courses + $semester2GPA * $totalSemeester2Courses / $totalCourses);  
    }
    
    // تمرير المتغيرات إلى الـ View
    return view('student.results', [
        'student' => $student,
        'semester1GPA'  => $semester1GPA,
        'semester2GPA'  => $semester2GPA,
        'cumulativeGPA' => $cumulativeGPA,
        'hasResults' => $totalCourses > 0
    ]);
}


 /**===== About Student Assignments ====== */
public function studentAssignments()
{
    // جلب المهام المخصصة للطالب الحالي
    $student = Auth::user();
    $assignments = $student->assignments()
        ->with(['submissions' => function($query) use ($student) {
            $query->where('student_id', $student->id);
        }])
        ->get();

    return view('assignments.student-index', compact('assignments'));
}

public function showAssignment(Assignment $assignment)
{
    // التحقق من أن المهمة مخصصة للطالب
    if (!$assignment->students->contains(Auth::id())) {
        abort(403, 'هذه المهمة غير مخصصة لك');
    }

    // جلب تسليم الطالب إن وجد
    $submission = Submission::where('assignment_id', $assignment->id)
        ->where('student_id', Auth::id())
        ->first();

    return view('assignments.show', compact('assignment', 'submission'));
}

public function submitSolution(Request $request, Assignment $assignment)
{
    // التحقق من أن المهمة مخصصة للطالب
    if (!$assignment->students->contains(Auth::id())) {
        abort(403, 'هذه المهمة غير مخصصة لك');
    }

    // التحقق من أن الوقت لم ينتهي
    if (now() > $assignment->deadline) {
        return back()->with('error', 'انتهى وقت تسليم المهمة');
    }

    $request->validate([
        'answers' => 'required|string',
    ]);

    // إنشاء أو تحديث التسليم
    Submission::updateOrCreate(
        [
            'assignment_id' => $assignment->id,
            'student_id' => Auth::id(),
        ],
        [
            'answers' => $request->answers,
            'submitted_at' => now(),
        ]
    );

    return redirect()->route('student.assignments')
        ->with('success', 'تم تسليم المهمة بنجاح');
}




}
    

