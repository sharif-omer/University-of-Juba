@include('dashboard.header')
<x-app-layout>

    {{-- ========= Start Content ===== --}}
<!DOCTYPE html>
<html lang="en">

<body>
    <div id="app">
      <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
    <div class="sidebar-header">
    <div class="d-flex justify-content-between">
        <div class="logo">
            <a href="#"><img src="{{asset('asset/images/logo/ulogo.png')}}" alt="Logo" srcset="" class=""></a>
        </div>
        <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
    </div>
    </div>
    <div class="sidebar-menu">
    <ul class="menu">        
        <li
            class="sidebar-item active ">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Student Dashboard</span>
            </a>
        </li>

            <a href="{{ route('students.results.showe', Auth::user()->student)}}" class='sidebar-link'>
                <i class="fas fa-table"></i>
                <span>View Results</span>
            </a>
            <a href="{{ route('student.assignments') }}" class='sidebar-link'>
                <i class="fas fa-tasks"></i>
                <span>Assignments</span>
            </a>
            <a href="{{ route('student.calendar') }}" class='sidebar-link'>
                <i class="fas fa-calendar-alt"></i>
                <span>Academic Calendar</span>
            </a>
            
            <a href="{{ route('student.support') }}" class='sidebar-link'>
                <i class="fas fa-headset"></i>
                <span>Support</span>
            </a>    
    </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            <h1 class="m-3 text-primary">Welcome, {{ Auth::user()->name }} !</h1>
            <div class="row g-4">
                <!-- Student Information-->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-dark  text-center">
                            <h5 class="text-light">Your Information</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Student Name:</strong> {{Auth::user()->name}}</li>
                                <li class="list-group-item"><strong>Index Number:</strong> {{Auth::user()->student->student_id}}</li>
                                <li class="list-group-item"><strong>Enrollment Year:</strong> {{Auth::user()->student->enrollment_year}}</li>
                                <li class="list-group-item"><strong>Current Semester:</strong> {{Auth::user()->student->current_semester}}</li>
                                <li class="list-group-item"><strong>Faculty:</strong> {{Auth::user()->student->faculty}}</li>
                                <li class="list-group-item"><strong>Department:</strong> {{Auth::user()->student->departments}}</li>
                                <li class="list-group-item"><strong>Current Year:</strong> {{Auth::user()->student->current_year}}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- My Courses -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-dark  text-center">
                            <h5 class="text-light">Your Courses</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                {{-- @foreach (auth::user()->courses as $course)
                                <li class="list-group-item">{{$course->course_code}}</li>
                                @endforeach --}}
                                <li class="list-group-item">Web Development</li>
                                <li class="list-group-item">Web Development</li>
                                <li class="list-group-item">Database Systems</li>
                                <li class="list-group-item">Database Systems</li>
                                <li class="list-group-item">Networking</li>
                                <li class="list-group-item">Networking</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Upcoming Deadlines -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-dark  text-center">
                            <h5 class="text-light">Upcoming Deadlines</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Assignment 1: <strong>{{Auth::user()->assignment}}feb 10</strong></li>
                                <li class="list-group-item">Project Submission: <strong>Jan 10</strong></li>
                                <li class="list-group-item">Midterms: <strong>Jan 15</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
@include('dashboard.footer')
    {{-- ========= End Content ===== --}}
</x-app-layout>

