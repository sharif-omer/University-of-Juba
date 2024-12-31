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
        
            <a href="{{ route('student.results') }}" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>View Results</span>
            </a>
            <a href="{{ route('student.assignments') }}" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Assignments</span>
            </a>
            <a href="{{ route('student.calendar') }}" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Academic Calendar</span>
            </a>
            
            <a href="{{ route('student.notifications') }}" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Notifications</span>
            </a>
            
            <a href="{{ route('student.support') }}" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Support</span>
            </a>
            
    {{-- <button class="sidebar-toggler btn x"><i data-feather="x"></i></button> --}}
    </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            <h3 class="m-3">Welcome, {{ Auth::user()->name }}!</h3>
            <div class="row g-4">
                <!-- Upcoming Deadlines -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-dark  text-center">
                            <h5>Upcoming Deadlines</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Assignment 1: <strong>Jan 5</strong></li>
                                <li class="list-group-item">Project Submission: <strong>Jan 10</strong></li>
                                <li class="list-group-item">Midterms: <strong>Jan 15</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            
                <!-- My Courses -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-dark  text-center">
                            <h5>Your Courses</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Web Development</li>
                                <li class="list-group-item">Database Systems</li>
                                <li class="list-group-item">Networking</li>
                            </ul>
                        </div>
                    </div>
                </div>
            
                <!-- Performance Metrics -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-dark  text-center">
                            <h5>Performance Metrics</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Attendance:</strong>10</p>
                            <p><strong>Overall Grade:</strong> A</p>
                        </div>
                    </div>
                </div>
            </div>
@include('dashboard.footer')
    {{-- ========= End Content ===== --}}
</x-app-layout>

