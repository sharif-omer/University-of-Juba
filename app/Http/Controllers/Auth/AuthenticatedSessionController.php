<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
//     public function authenticated(Request $request, $user)
// {
//     if ($user->role == 'student') {
//         return redirect()->route('student.dashboard');
//     } elseif ($user->role == 'staff') {
//         return redirect()->route('staff.dashboard');
//     } elseif ($user->role == 'lecturer') {
//         return redirect()->route('lecturer.dashboard');
//     }
// }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $authUserRole = Auth::user()->role;
        if($authUserRole == 0) {
            return redirect()->intended(route('dashboard', absolute: false));
        }elseif($authUserRole == 1){
            return redirect()->intended(route('student', absolute: false));
        }else {
            return redirect()->intended(route('lecturer', absolute: false));
        }
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
