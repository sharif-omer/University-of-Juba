<?php

namespace App\Http\Controllers;

use App\Http\Middleware\lecturer as MiddlewareLecturer;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Lecturer;
use App\Models\Courses;
use App\Models\Assignments;
use App\Models\Results;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturer = Lecturer::all();
        return view('lecturer.index', compact('lecturer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturer = Lecturer::all();
        return view('lecturer.create', compact('lecturer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
        ]);

        $lecturer = $request->all();
        $lecturer = Lecturer::create($lecturer);
        return redirect()->route('lecturer.index')
                        ->with('success','Lecturers created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturer.edit', compact('lecturer'))->with('success','Lecturers updated successfully');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
        ]);
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->name = $request->input('name');
        $lecturer->email = $request->input('email');
        $lecturer->phone_number = $request->input('phone_number');
        $lecturer->save();
        return redirect()->route('lecturer.index')->with('success','Lecturers updated successfully');
    } // End Method

    public function viewCourses()
    {
        $courses = Courses::all();
        return view('lecturer.courses', compact('courses'));
    }

    public function addCourse(Request $request)
    {
        $request->validate([
            'course_name'  => 'required|string|max:255',
            'course_code'  => 'required|string|max:10', 
            'credit_hours' => 'required|string|max:10',
            'fuculty'      => 'required|string|max:10',
            'deparment'    => 'required|string|max:255',
            'semester'     => 'required|string|max:255',
        ]);

        // Save the course to the database
        $courses = $request->all();
        $courses = Courses::create($courses);
        return back()->with('success', 'Course added successfully!');
    }

    public function viewResults()
    {
        $results = Results::all();
        return view('lecturer.results', compact('results'));
    }

    public function addResult(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'course_code' => 'required|string',
            'grade' => 'required|string|max:2',
        ]);

        // Save the result to the database
        $results = $request->all();
        $results = Results::create($results);
        return back()->with('success', 'Result added successfully!');
    }

    public function viewAssignments()
    {
        $assignments = Assignments::all();
        return view('lecturer.assignments', compact('assignments'));
    }

    public function addAssignment(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string',
            'assignment_file' => 'required|file|mimes:pdf,docx|max:2048',
        ]);

        $assignments = $request->all();
        $assignments = Assignments::create($assignments);
        // return back()->with('success', 'Course added successfully!');
        // Store the uploaded assignment
        // $fileName = $request->file('assignment_file')->store('assignments');
        $fileName = $request->file('assignment_file')->store('upload/assignment_files');

        if($request->file('assignment_file'))
        {
         $file = $request->file('assignment_file');

         $filename = date('YmdHi').$file->getClientOriginalName();
         $file->move(public_path('upload/assignment_files'), $filename);
         $assignment['assignment_file'] = $filename;
       }
    //    $assignment->save();

        return back()->with('success', 'Assignment uploaded successfully!');
    }

    public function viewNotifications()
    {
        return view('lecturer.notifications');
    }

    public function addNotification(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Save the notification to the database
        return back()->with('success', 'Notification sent successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $lecturer = Lecturer::find($id);
       $lecturer->delete();
        
    //      $notification = array (
    //       'message' => 'Student Deleted  Sucessfully',
    //       'alert-type' => 'success'
    //   );
    //   return redirect()->back()->with($notification);
    return redirect()->route('lecturer.index')->with('success','Lecturers deleted successfully');
    }
}
