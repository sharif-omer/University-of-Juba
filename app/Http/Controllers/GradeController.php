<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Submission;

class GradeController extends Controller
{
    public function create(Submission $submission)
    {
        return view('grades.create', compact('submission'));
    }
    
    public function store(Request $request, Submission $submission)
    {
        $request->validate([
            'grade' => 'required|numeric|min:0|max:100',
            'feedback' => 'nullable'
        ]);
        
        $submission->grade()->create([
            'grade' => $request->grade,
            'feedback' => $request->feedback
        ]);
        
        return redirect()->route('assignments.submissions', $submission->assignment)
            ->with('success', 'تم تسجيل الدرجة بنجاح');
    }
}