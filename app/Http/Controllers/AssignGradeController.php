<?php

namespace App\Http\Controllers;

use App\Models\AssignGrade;
use Illuminate\Http\Request;
use App\Models\Submission;

class AssignGradeController extends Controller
{
    public function create(Submission $submission)
{
    return view('gradings.create', compact('submission'));
}

public function store(Request $request, Submission $submission)
{
    $validated = $request->validate([
        'grade' => 'required|numeric|min:0|max:100',
        'feedback' => 'nullable|string'
    ]);

    $grading = new AssignGrade($validated);
    $grading->lecturer_id = auth()->id();
    
    $submission->grading()->save($grading);

    return redirect()->route('lecturer.assignments.submissions', $submission->assignment)
           ->with('success', 'Correction Save Successfully');
}
    public function destroy(assignGrade $assignGrade)
    {
        //
    }
}
