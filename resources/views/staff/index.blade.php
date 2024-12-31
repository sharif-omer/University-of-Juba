@include('dashboard.header')


    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="{{asset('asset/images/logo/ulogo.png')}}" alt="Logo" srcset=""></a>
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
            <a href="index.html" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Admin Dashboard</span>
            </a>
        </li>
            
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Components</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="component-alert.html">Alert</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">Badge</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-breadcrumb.html">Breadcrumb</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-button.html">Button</a>
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
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Lecturers</h3>
                <p class="text-subtitle text-muted">For Lecturer to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="#" class="badge bg-success p-2">Add Lecturers</a>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>action</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <tr>
                            <td>1</td>
                            <td>Sharif Omer</td>
                            <td>sharifomer@gmail.com</td>
                            <td>07624 869434</td>
                            <td>
                              <span class="badge bg-success">Active</span>
                            </td>
                            <td><a href="#" class="badge bg-info">Edit</a></td>
                            <td><a href="#" class="badge bg-danger">Delete</a></td> 
                        </tr>
                        
                        
                        <tr>
                            <td>2</td>
                            <td>Tarir Abdon</td>
                            <td>tarir@gmail.com</td>
                            <td>07624 869434</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td><a href="#" class="badge bg-info">Edit</a></td>
                            <td><a href="#" class="badge bg-danger">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->

    
</div>  

<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Student</h3>
              <p class="text-subtitle text-muted">For Student to check they list</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>

  <!-- Student Tables start -->
  <section class="section">
      <div class="card">
          <div class="card-header">
              <a href="#" class="badge bg-success p-2">Add Students</a>
          </div>
          <div class="card-body">
              <table class="table" id="table1">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Status</th>
                          <th>action</th>
                          <th>action</th>
                      </tr>
                  </thead>
                  <tbody>     
                      <tr>
                          <td>1</td>
                          <td>Sharif Omer</td>
                          <td>sharifomer@gmail.com</td>
                          <td>07624 869434</td>
                          <td>
                            <span class="badge bg-success">Active</span>
                          </td>
                          <td><a href="#" class="badge bg-info">Edit</a></td>
                          <td><a href="#" class="badge bg-danger">Delete</a></td> 
                      </tr>
                      
                      
                      <tr>
                          <td>2</td>
                          <td>Tarir Abdon</td>
                          <td>tarir@gmail.com</td>
                          <td>07624 869434</td>
                          <td>
                              <span class="badge bg-success">Active</span>
                          </td>
                          <td><a href="#" class="badge bg-info">Edit</a></td>
                          <td><a href="#" class="badge bg-danger">Delete</a></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </section>
  <!-- Student Tables end -->

  
</div>  

        </div>
    </div>
    

    @include('dashboard.footer')
    
</body>

</html>
