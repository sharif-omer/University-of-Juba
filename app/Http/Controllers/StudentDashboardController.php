<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentDashboardController extends Controller
{
     // Show the student login form
     public function showLoginForm()
     {
         return view('auth.student-login');
     }
 
     // Handle student login
     public function login(Request $request)
     {
         $request->validate([
             'name' => 'required|string', // Allow login by name or email
             'student_id' => 'required|string',
         ]);
 
         // Check if login is by student_id or name
         $credentials = $request->only('name');
         $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'name' : 'student_id';
         $credentials[$loginField] = $request->login;
 
         // Attempt login for students only
         if (Auth::attempt($credentials) && Auth::user()->role === 'student') {
             $request->session()->regenerate();
             return redirect()->route('student.dashboard');
         }
 
         return back()->withErrors([
             'login' => 'Invalid credentials or you are not a student.',
         ]);
     }

       // Student dashboard
    public function dashboard()
    {
        return view('students.dashboard', ['student' => Auth::user()]);
    }
}

   
