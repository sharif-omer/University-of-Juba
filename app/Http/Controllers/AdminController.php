<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::all();
        return view('admin.index', compact('data'));
    } // End Method

// Admin Controller

public function admin_up(Request $request) {

    // if (Auth::guard('admin')->check()) {
        
    $requests = $request->validate([
        'name' => ['required', 'min:5',],
        'email' => ['required', 'email', 'min:5', 'max:200'],
        // 'school_email' => ['required', 'email', 'min:5', 'max:200'],
        // 'position' => ['required', 'min:1', 'max:200'],
        // 'faculty_id' => ['required', 'min:1', 'max:200'],
        // 'department_id' => ['required', 'min:1', 'max:200'],
        // 'phone_no' => ['required', 'min:11', 'max:15'],
        // 'password' => ['required', 'min:5', 'max:200'],
        // 'section_id' => ['required', 'max:200'],
        // 'location' => ['required', 'min:1'],
        // 'picture' => ['required', 'mimes:jpg,png,jpeg,webp', 'max:1000000']
    ]);

    // $admin_exist = Admin::where('name', '=', $request['name'])->orwhere('email', '=', $request['email'])->first();

    // if ($admin_exist) {
    //     return back()->with('error', 'Admin already exist!');
    // }


    // $requests['password'] = bcrypt($requests['password']);
    // $newImageName = time() . '-' . $request->name_a . '.' . $request->picture_a->extension();
    // $request->picture_a->move(public_path('assets/images/admin'), $newImageName);
    // $requests['picture'] = 'user.png';
    // $requests['unique_id'] = rand(time(), 100000000);
    // $requests['status'] = 'Active Now';
    $admin = Admin::create($requests);

    // $role = Role::all();

    // $admin->assignRole('admin');

    // $permission = Permission::all();

    // $admin->givePermissionTo('dashboard');


    // Mail::to($admin['email'])->send(new AdminRegistration($admin));
    
    
    // return redirect('/lecturer/admin/add_admin')->with('success', 'Admin Successfully Added!');
    return redirect('/dashboard/admin')->with('success', 'Admin Successfully Added!');
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'number_of_team'=>'required'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
