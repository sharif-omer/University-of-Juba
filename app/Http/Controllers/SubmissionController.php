<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\User;

class SubmissionController extends Controller
{
    public function create(Assignment $assignment)
    {
        if (now() > $assignment->due_date) {
            return redirect()->back()->with('error', 'انتهى وقت التسليم لهذه المهمة');
        }
        
        return view('submissions.create', compact('assignment'));
    }
    
    public function store(Request $request, Assignment $assignment)
    {
        if (now() > $assignment->due_date) {
            return redirect()->back()->with('error', 'انتهى وقت التسليم لهذه المهمة');
        }
        
        $request->validate([
            'answers' => 'required'
        ]);
        
        $submission = new Submission([
            'answers' => $request->answers
        ]);
        $user = Auth::user();
        $submission->student()->associate($user());
        $submission->assignment()->associate($assignment);
        $submission->save();
        
        return redirect()->back()->with('success', 'تم تقديم الحل بنجاح');
    }
}
