<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\AssignmentGrade;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class AssignmentController extends Controller
{
    public function index()
{
    $assignments = Assignment::all();
    $students = User::where('role', 2)->get(); // جلب كل الطلاب
    return view('assignments.index', compact('students', 'assignments'));
}

    public function create()
{
    $students = User::where('role', 2)->get(); // جلب كل الطلاب
    return view('assignments.create', compact('students'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'deadline' => 'required|date',
        'students' => 'required|array',
    ]);

    $assignment = Assignment::create([
        'title' => $request->title,
        'description' => $request->description,
        'deadline' => $request->deadline,
        'lecturer_id' => auth()->id(),
    ]);

    $assignment->students()->attach($request->students);

    // return redirect()->back();
    return redirect()->route('assignment.index')->with('success', 'Assignment Created Successfuly' );
} // End Method

public function edit($id): View
{
    $assignment = Assignment::findOrFail($id);
    return view('assignments.edit', compact('assignment'));
} // End Method

public function update(Request $request, $id)
{
   $updateAssignment  = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'deadline' => 'required|date',
    ]);

    $assignment = Assignment::findOrFail($id);
    $assignment->update($updateAssignment);
    return redirect()->route('assignment.index')->with('success','Assignment Updated Successfully');

}

 /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $assignment = Assignment::find($id);
       $assignment->delete();
    return redirect()->route('assignment.index')->with('success','Assignment Deleted Successfully');
    } // End Method

public function viewSubmissions(Assignment $assignment)
{
    $submissions = $assignment->submissions()->with('student')->get();
    return view('lecturer.submissions.index', compact('assignment', 'submissions'));
}

public function viewSubmission(Submission $submission)
{
    return view('lecturer.submissions.show', compact('submission'));
}

public function gradeSubmission(Request $request, Submission $submission)
{
    $request->validate([
        // 'submission_id' => 'required|exists:submissions,id',
        'grade' => 'required|numeric|min:0|max:30',
        'feedback' => 'nullable|string',
    ]);
    try {
        DB::beginTransaction();
        $assignment = AssignmentGrade::updateOrcreate(
            ['submission_id' => $submission->id],
            [
                'grade' => $request->grade,
                'feedback' => $request->feedback,


            ]);
            $submission->update([
                'grade' => $request->grade,
                'feedback' => $request->feedback,
            ]);
            DB::commit();
            return redirect()->route('assignments.submissions', $submission->assignment)->with('success', 'Answer is Correction Succussfuly');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Faild: ' . $e->getMessage());

    }

   
    $submission->update([
        'grade' => $request->grade,
        'feedback' => $request->feedback,
    ]);

    return redirect()->route('assignments.submissions', $submission->assignment)
           ->with('success', 'Answer is Correction Succussfuly');
}

}


