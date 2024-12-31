<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

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
        $student = Student::all();
        return view('students.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'student_id' => 'required',
            'enrollment_year' => 'required',
            'faculty' => 'required',
            'semester' => 'required',
            'year' => 'required',
        ]);
       
        $student = $request->all();
        $student = Student::create($student);
        return redirect()->route('student.index')
                        ->with('success','Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('students.show');

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
            'name' => 'required',
            'student_id' => 'required',
            'enrollment_year' => 'required',
            'faculty' => 'required',
            'semester' => 'required',
            'year' => 'required',
        ]);
        $student = Student::findOrFail($id);
        $student->name = $request->input('name');
        $student->student_id = $request->input('student_id');
        $student->enrollment_year = $request->input('enrollment_year');
        $student->faculty = $request->input('faculty');
        $student->semester = $request->input('semester');
        $student->year = $request->input('year');
        $student->save();
        return redirect()->route('student.index')->with('success','students created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
    
        $student->delete();
    
    //      $notification = array (
    //       'message' => 'Student Deleted  Sucessfully',
    //       'alert-type' => 'success'
    //   );
    //   return redirect()->back()->with($notification);
    return redirect()->route('student.index')->with('success','student created successfully');

    }
    public function showResults()
    {
        $results = [
            ['course' => 'Data Structures', 'grade' => 'A'],
            ['course' => 'Operating Systems', 'grade' => 'B+'],
            ['course' => 'Artificial Intelligence', 'grade' => 'B'],
            ['course' => 'Programming Languege', 'grade' => 'A'],
        ];
    
        return view('student.results', compact('results'));
    }

    // public function showAssignments()
    // {
    //     // Fetch assignments
    //     return view('student.assignments');
    // }

    public function showAssignments()
{
    return view('student.assignments');
}

public function submitAssignment(Request $request)
{
    $request->validate([
        'course' => 'required|string',
        'file' => 'required|file|mimes:pdf,docx|max:2048',
    ]);

    // Store the uploaded file
    $fileName = $request->file('file')->store('assignments');

    return back()->route('student')->with('success', 'Assignment submitted successfully!');
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

    public function showCalendar()
    {
        $events = [
            ['date' => '2024-01-10', 'event' => 'Start of Spring Semester'],
            ['date' => '2024-03-20', 'event' => 'Midterm Exams'],
            ['date' => '2024-05-15', 'event' => 'Final Exams'],
        ];
    
        return view('student.calendar', compact('events'));
    }

    public function showNotifications()
    {
        // Fetch notifications
        $notifications = [
            'Assignment on "Data Structures" due in 2 days.',
            'Midterm results have been released.',
            'AI Workshop on Friday at 10:00 AM.',
        ];
    
        return view('student.notifications', compact('notifications'));
    }

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
}
