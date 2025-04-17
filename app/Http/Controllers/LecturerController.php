<?php

namespace App\Http\Controllers;

use App\Http\Middleware\lecturer as MiddlewareLecturer;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\User;
use App\Models\Result;
use App\Models\Student;
// view()

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
        
        $lecturer = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone_number' => 'required|unique:lecturers,phone_number',

        ]);
        $user = User::create([
            'name' => $lecturer['name'],
            'email' => $lecturer['email'],
            'password' => Hash::make($lecturer['password']),
            'role' => 1,
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
     * Show the form for editing Lecturer Info.
     */
    public function edit($id): View
    {
        $lecturer = Lecturer::findOrFail($id);
        return view('lecturer.edit', compact('lecturer'))->with('success','Lecturers updated successfully');
    }

    /**
     * Update Lecturer Info.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|unique:lecturers,phone_number',
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
        $courses = Course::all();
        return view('lecturer.courses', compact('courses'));
    } // End Method

    public function viewAssignments()
    {
        $assignments = Assignment::all();
        return view('lecturer.assignments', compact('assignments'));
    }

    public function addAssignment(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string',
            'assignment_file' => 'required|file|mimes:pdf,docx|max:2048',
        ]);

        $assignments = $request->all();
        $assignments = Assignment::create($assignments);
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
            $lecturer = Lecturer::findOrFail($id);
            $lecturer->delete();
            return redirect()->route('lecturer.index')->with('success','Lecturers Deleted Successfully!');
            
    }
}
