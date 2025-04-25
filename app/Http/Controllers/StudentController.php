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
use Illuminate\Validation\Rule;
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
        
       $validated = $request->validate([
            'student_id' => 'required',
            'enrollment_year' => 'required',
            'faculty' => 'required',
            'departments' => 'required',
            'current_semester' => 'required',
            'current_year' => 'required',
        ]);
        $student = Student::findOrFail($id);
        $student->update($validated);
      
        return redirect()->route('student.index')->with('success','Student Information Updated Successfully');
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
     if (!Auth::check()) {
         return redirect()->route('login');
     }
 
     $user = Auth::user();
     $student = $user->student;
 
     // التحقق من أن الطالب هو نفسه المسجل
     if ($user->student->id !== $student->id) {
         abort(403);
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
 
     // تقسيم النتائج إلى فصلين
     $semester1 = $student->results->where('semester', 'first');
     $semester2 = $student->results->where('semester', 'second');
 
     // دالة لحساب المعدل الفصلي وإجمالي الساعات
     function calculateSemesterData($courses, $gradePoints)
     {
         $totalWeightedPoints = 0;
         $totalCreditHours = 0;
 
         foreach ($courses as $course) {
             $grade = $course->grade;
             $creditHours = $course->course->credit_hours;
             if (isset($gradePoints[$grade])) {
                 $totalWeightedPoints += $gradePoints[$grade] * $creditHours;
                 $totalCreditHours += $creditHours;
             }
         }
 
         $gpa = $totalCreditHours > 0 ? $totalWeightedPoints / $totalCreditHours : 0;
 
         return [
             'gpa' => $gpa,
             'totalHours' => $totalCreditHours,
             'totalPoints' => $totalWeightedPoints
         ];
     }
 
     // حساب بيانات الفصلين
     $semester1Data = calculateSemesterData($semester1, $gradePoints);
     $semester2Data = calculateSemesterData($semester2, $gradePoints);
 
     $totalCreditHours = $semester1Data['totalHours'] + $semester2Data['totalHours'];
     $totalWeightedPoints = $semester1Data['totalPoints'] + $semester2Data['totalPoints'];
 
     // المعدل التراكمي
     $cumulativeGPA = $totalCreditHours > 0 ? $totalWeightedPoints / $totalCreditHours : 0;
 
     return view('student.results', [
         'student' => $student,
         'semester1GPA' => $semester1Data['gpa'],
         'semester2GPA' => $semester2Data['gpa'],
         'cumulativeGPA' => $cumulativeGPA,
         'hasResults' => $totalCreditHours > 0
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
        ->with('success', 'assignments Submited Successfuly'  );
}




}
    

