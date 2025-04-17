<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body>
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
                <div class="col-md-3">
                  <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Total Students</h5>
                      <p><i class="fa fa-user-graduate"></i>
                        {{-- <span id="students-count">0</span> --}}
                      </p>
                      {{-- {{$totalStudents}} --}}
                      <p class="card-text fs-4">1,245</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Total Lecturers</h5>
                      <p><i class="fa fa-chalkboard-teacher"></i>
                        {{-- <span id="lecturers-count">0</span> --}}
                      </p>
                      {{-- {{$totalLecturers}} --}}
                      <p class="card-text fs-4">145</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Faculites</h5>
                      <p><i class="fa fa-university"></i></p>
                      <p class="card-text fs-4">08</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                      <h5 class="card-title">Courses</h5>
                      <p><i class="fa fa-book-open"></i>
                        {{-- <span id="courses-count">0</span> --}}
                      </p>
                       {{-- {{$totalCourses}} --}}
                      <p class="card-text fs-4">52</p>
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

</body>
</html>