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
            <a href="{{route('lecturer')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Lecturer Dashboard</span>
            </a>
        </li>
      
            <a href="{{route('results.index')}}" class='sidebar-link'>
                <i class="fas fa-chart-line"></i>
                <span>Manage Results</span>
            </a>

            <a href="{{ route('assignment.index') }}" class='sidebar-link'>
                <i class="fas fa-tasks"></i>
                <span>Upload Assignments</span>
            </a>
        <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Academic Event</span>
        </a>
        {{-- <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{route('calendar.index')}}">Clendar</a>
            </li>
            <li class="submenu-item ">
                <a href="#">Time Table</a>
            </li>  
    
            <li class="submenu-item ">
                <a href="{{route('course.index')}}">Courses</a>
            </li>       
        </ul> --}}
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
            <h1 class="text-primary">Welcome, Mr. {{ Auth::user()->name }}</h1>
            <h5 class="m-3">Here’s what’s happening in your courses today.</h5>
        </div>
        
        <!-- Metrics Cards -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Courses Taught</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Active Students</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Pending Assignments</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5>Messages</h5>
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
                            <li class="list-group-item mt-1">
                                <strong>E-Commerce</strong> <br>
                                <strong>E-Government</strong> <br>
                                <strong>Web Devolopment</strong> <br>
                                <strong>OOP</strong> 
                                <span class="float-end">
                                </span>
                            </li>
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

