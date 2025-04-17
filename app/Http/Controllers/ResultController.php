<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Result;
use App\Models\Course;
use App\Models\Semester;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller

{
    public function index()
    {
        $result = Result::all();
        
        return view('results.index', compact('result'));
    }

    public function create()
    {
        $students = Student::with('user')->get();
        $course = Course::all();
        
        return view('results.create', compact('students', 'course'));
    }
 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'semester' => 'required|in:first,second',
            'marks' => 'required|integer|min:0|max:100',

        ]);
         $grade = $this->calculateGrade($request->marks);

         $validated['grade'] = $grade;
         Result::create($validated);   
        return redirect()->route('results.index')->with('success', 'Result added Successfully');
    }
        private function calculateGrade($marks)
         {
                    if ($marks >= 90) return 'A';
                    if ($marks >= 85) return 'B+';
                    if ($marks >= 80) return 'B';
                    if ($marks >= 75) return 'C+';
                    if ($marks >= 70) return 'C';
                    if ($marks >= 65) return 'D+';
                    if ($marks >= 60) return 'D';
                    return 'F';
         }



   public function edit(string $id)
    {
        $result = Result::findOrFail($id);
        return view('results.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'marks' => 'required|integer|min:0|max:100',

        ]);
        $result = Result::findOrFail($id);
        $result->marks = $request->input('marks');
    
        $result->save();
        return redirect()->route('results.index')->with('success','results updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Result::find($id);
        $result->delete();
        
          return redirect()->route('results.index')->with('success','result deleted successfully');
     }
    }

     





