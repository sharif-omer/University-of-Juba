@include('dashboard.header')
<x-app-layout>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
    }
    
    
    .main-content {
      padding: 20px;
    }
  </style>

<body>
    <div id="app">
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

<!-- ==== Start Content === -->
<div class="col-md-12">
    <h3 class="text-primary">Welcome, {{ Auth::user()->name}} !</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="main-content">
            <div class="container-fluid">
              <!-- Welcome Header -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <button class="btn btn-primary">Add New Record</button>
              </div>
        
              <!-- Stats Cards -->
              <div class="row">
                   <!-- Student Col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Total Students</h5>
                      <p class="card-text fs-4">{{$studentCount}}</p>
                    </div>
                  </div>
                </div>

                   <!-- Lecturers Col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Total Lecturers</h5>
                      <p class="card-text fs-4">{{$lecturerCount}}</p>
                    </div>
                  </div>
                </div>

                  <!-- Faculites Col -->
                <div class="col-12 col-md-6 col-lg-3 text-center">
                  <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Faculites</h5>
                      <p class="card-text fs-4">8</p>
                    </div>
                  </div>
                </div>

                 <!-- Courses Col -->
                <div class="col-12 col-md-6 col-lg-3">
                  <div class="card text-white bg-warning mb-3 text-center">
                    <div class="card-body">
                      <h5 class="card-title">Courses</h5>
                      <p class="card-text fs-4 ">{{$courseCount}}</p>
                    </div>
                  </div>
                </div>
              </div>
        
              <!-- Recent Activity -->
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4">
                    <div class="card-header">
                      Recent Student Registrations
                    </div>
                    <div class="card-body">
                      <ul class="list-group">
                        <li class="list-group-item">John Doe - Registered for Computer Science</li>
                        <li class="list-group-item">Jane Smith - Registered for Mathematics</li>
                        <li class="list-group-item">Ali Ahmed - Registered for Information Technology</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4">
                    <div class="card-header">
                      Upcoming Events
                    </div>
                    <div class="card-body">
                      <p><strong>Workshop:</strong> Advanced Laravel - January 5th</p>
                      <p><strong>Seminar:</strong> AI Trends in Education - January 10th</p>
                      <p><strong>Exam:</strong> Final Year Exams - January 15th</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>
<!-- ==== End Content === -->




<!-- ==== Start Sidebar === -->
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        <div class="sidebar-header">
<div class="d-flex justify-content-between">
    <div class="logo">
        <a href="{{route('dashboard')}}"><img src="{{asset('asset/images/logo/ulogo.png')}}" alt="Logo" srcset=""></a>
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
        <a href="{{route('dashboard')}}" class='sidebar-link'>
            <i class="fa fa-user-shield"></i>
            <span>Admin Dashboard</span>
        </a>

    </li>
    
    <a href="{{route('course.index')}}" class='sidebar-link'>
      <i class="fa fa-book-open"></i>
      <span>Manage Courses</span>
  </a>

    <a href="{{route('calendar.index')}}" class='sidebar-link'>
      <i class="fa fa-calendar-alt"></i>
      <span>Manage Calendar</span>
   </a>

   <a href="{{route('student.index')}}" class='sidebar-link'>
    <i class="fa fa-user-graduate"></i>
    <span>Manage Students</span>
  </a>

    <a href="{{route('lecturer.index')}}" class='sidebar-link'>
        <i class="fa fa-chalkboard-teacher"></i>
        <span>Manage Lecturers</span>
    </a>

    <a href="{{route('notifications.all')}}" class='sidebar-link'>
      <i class="fas fa-bell"></i>
        <span>Sent Notifications</span>
    </a>
   <li
    class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-stack"></i>
        <span>Academic Event</span>
    </a>   
 </li>
    
</ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>


</div>
@include('dashboard.footer')
    {{-- ========= End Content ===== --}}
</x-app-layout>
