<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class Coursescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::all();
        return view('courses.index', compact('course'));
    } // End Method

    public function create()
    {
        $students = Student::with('user')->get();
        $course = Course::all();
        return view('courses.create', compact('course','students'));
    } // End Method

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'course_code' => 'required',
            'credit_hours' => 'required',
            'fuculty' => 'required',
            'deparment' => 'required',
            // 'user_id' => 'required|exists:users,id',

        ]);

        $course = $request->all();
        $course = Course::create($course);
        return redirect()->route('course.index')
                        ->with('success','Course created successfully');
    } // End Method


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    } // End Method


     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $updated =  $request->validate([
            'course_name' => 'required',
            'course_code' => 'required',
            'credit_hours' => 'required',
            'fuculty' => 'required',
            'deparment' => 'required',
            // 'user_id' => 'required|exists:users,id',

        ]);

        $course = Course::findOrFail($id);
        $course->update($updated);

        return redirect()->route('course.index')->with('success','course created successfully');
    } // End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $course = Course::find($id);
       $course->delete();
    return redirect()->route('course.index')->with('success','Course Deleted Successfully');
    }

}
