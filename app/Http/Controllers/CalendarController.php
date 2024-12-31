<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class Calendarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendar = Calendar::all();
        return view('calendar.index', compact('calendar'));
    } // End Method

    public function create()
    {
        $calendar = Calendar::all();
        return view('calendar.create', compact('calendar'));
    } // End Method

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'event_type' => 'required',
            'academic_year' => 'required',
            'semester' => 'required',
        ]);
        
        $calendar = $request->all();
        $calendar = Calendar::create($calendar);
        return redirect()->route('calendar.index')
                        ->with('success','calendar created successfully');
    } // End Method


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $calendar = Calendar::findOrFail($id);
        return view('calendar.edit', compact('calendar'));
    } // End Method


     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'event_type' => 'required',
            'academic_year' => 'required',
            'semester' => 'required',
        ]);
        

        $calendar = Calendar::findOrFail($id);
        $calendar->title = $request->input('title');
        $calendar->description = $request->input('description');
        $calendar->start_time = $request->input('start_time');
        $calendar->end_time = $request->input('end_time');
        $calendar->event_type = $request->input('event_type');
        $calendar->academic_year = $request->input('academic_year');
        $calendar->semester = $request->input('semester');
        $calendar->save();
        return redirect()->route('calendar.index')->with('success','calendar created successfully');
    } // End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $calendar = Calendar::find($id);
       $calendar->delete();
        
    //      $notification = array (
    //       'message' => 'Student Deleted  Sucessfully',
    //       'alert-type' => 'success'
    //   );
    //   return redirect()->back()->with($notification);
    return redirect()->route('calendar.index')->with('success','calendar deleted successfully');
    }

}
