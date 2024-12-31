<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class Coursescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Courses::all();
        return view('courses.index', compact('course'));
    } // End Method

    public function create()
    {
        $course = Courses::all();
        return view('courses.create', compact('course'));
    } // End Method

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'course_name' => 'required',
            'course_code' => 'required',
            'credit_hours' => 'required',
            'fuculty' => 'required',
            'deparment' => 'required',
            'semester' => 'required',
        ]);

        $course = $request->all();
        $course = Courses::create($course);
        return redirect()->route('course.index')
                        ->with('success','Course created successfully');
    } // End Method


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $course = Courses::findOrFail($id);
        return view('courses.edit', compact('course'));
    } // End Method


     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required',
            'course_code' => 'required',
            'credit_hours' => 'required',
            'fuculty' => 'required',
            'deparment' => 'required',
            'semester' => 'required',
        ]);

        $course = Courses::findOrFail($id);
        $course->course_name = $request->input('course_name');
        $course->course_code = $request->input('course_code');
        $course->credit_hours = $request->input('credit_hours');
        $course->fuculty = $request->input('fuculty');
        $course->deparment = $request->input('deparment');
        $course->semester = $request->input('semester');
        $course->save();
        return redirect()->route('course.index')->with('success','course created successfully');
    } // End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $course = Courses::find($id);
       $course->delete();
        
    //      $notification = array (
    //       'message' => 'Student Deleted  Sucessfully',
    //       'alert-type' => 'success'
    //   );
    //   return redirect()->back()->with($notification);
    return redirect()->route('course.index')->with('success','course deleted successfully');
    }

}
