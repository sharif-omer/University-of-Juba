@include('dashboard.header')
<x-app-layout>

    {{-- ========= Start Content ===== --}}

    @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        timer: 3000, // Auto close after 3 seconds
        showConfirmButton: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
        timer: 3000, // Auto close after 3 seconds
        showConfirmButton: false
    });
</script>
@endif



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
        <li class="sidebar-item active ">
            <a href="index.html" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Lecturer Dashboard</span>
            </a>
        </li>
        
        <li
            class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Academic Events</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{ route('lecturer.courses') }}">Manage Courses</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('lecturer.results') }}">Manage Results</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('lecturer.assignments') }}">Upload Assignments</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('lecturer.notifications') }}">Send Notifications</a>
                </li>  
            </ul>
        </li> 
        <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Academic Event</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{route('calendar.index')}}">Clendar</a>
            </li>
            <li class="submenu-item ">
                <a href="#">Time Table</a>
            </li>  
    
            <li class="submenu-item ">
                <a href="{{route('course.index')}}">Courses</a>
            </li>       
        </ul>
    </li>        
    </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="container mt-4">
    <div class="row">
        <!-- Welcome Header -->
        <div class="col-md-12">
            <h3 class="text-primary">Welcome, Mr. {{ Auth::user()->name }}</h3>
            <h4 class="m-2">Here’s what’s happening in your courses today.</h4>
        </div>
        
        <!-- Metrics Cards -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Courses Taught</h5>
                    {{-- <h2>{{ $coursesCount }}</h2> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Active Students</h5>
                    {{-- <h2>{{ $studentsCount }}</h2> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Pending Assignments</h5>
                    {{-- <h2>{{ $pendingAssignments }}</h2> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Messages</h5>
                    {{-- <h2>{{ $unreadMessages }}</h2> --}}
                </div>
            </div>
        </div>

        <!-- Main Sections -->
        <div class="col-md-8 mt-4">
            <!-- Courses List -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Your Courses
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        {{-- @foreach($courses as $course) --}}
                            <li class="list-group-item mt-1">
                                {{-- <strong>{{ $course->course_name}}</strong>  --}}
                                <strong>E-Commerce</strong> <br>
                                <strong>Web Devolopment</strong> 

                                <span class="float-end">
                                    {{-- <a href="/courses/{{ $course->course_code}}/manage" class="btn btn-sm btn-secondary">Manage</a> --}}
                                    <a href="{{route('lecturer.addCourse')}}" class="btn btn-sm btn-secondary">Manage</a>
                                </span>
                            </li>
                        {{-- @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>

        <!-- Calendar Section -->
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Schedule
                </div>
                <div class="card-body mt-1">
                    <div id="calendar">Every Monday - Start 10th Oct</div>
                    <div id="calendar">Every Friday - Start 10th Oct</div>
                    <div id="calendar">Every Sunday - Start 10th Oct</div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
@include('dashboard.footer')
</x-app-layout>

