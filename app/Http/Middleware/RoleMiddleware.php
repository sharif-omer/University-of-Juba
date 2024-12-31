<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
      $authUserRole = Auth::user()->role;

      switch($role){
        case 'admin':
            if($authUserRole == 0){
              return $next($request);
            }
            break;
        case 'lecturer':
            if($authUserRole == 1){
            return $next($request);
            }
            break;
        case 'student':
            if($authUserRole == 2){
            return $next($request);
            }
            break;
      }
      switch($authUserRole) {
        case 0:
            return redirect()->route('dashboard');
        case 1:
            return redirect()->route('lecturer');
        case 2:
            return redirect()->route('student');
      }
      return redirect()->route('login');
    }
}


