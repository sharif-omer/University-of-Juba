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
    <li class="sidebar-title">Menu</li>
    
    <li
        class="sidebar-item active ">
        <a href="{{route('dashboard')}}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Admin Dashboard</span>
        </a>
    </li>
    
    <li
        class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Management</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
                <a href="{{route('lecturer.index')}}">Lecturers</a>
            </li>
            <li class="submenu-item ">
                <a href="{{route('student.index')}}">Students</a>
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

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownNotifications" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-bell"></i>
        @auth
            @if(auth()->user()->unreadNotifications->count() > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ auth()->user()->unreadNotifications->count() }}
                    <span class="visually-hidden">unread notifications</span>
                </span>
            @endif
        @endauth
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownNotifications">
        @auth
            @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                <li>
                    <a class="dropdown-item" href="{{ route('notifications.markAsRead', $notification->id) }}">
                        <div class="d-flex justify-content-between">
                            <span>{{ $notification->data['title'] ?? 'إشعار جديد' }}</span>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-0 text-truncate" style="max-width: 250px;">{{ $notification->data['message'] }}</p>
                    </a>
                </li>
            @empty
                <li><a class="dropdown-item text-muted" href="#">لا توجد إشعارات جديدة</a></li>
            @endforelse
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-primary" href="{{ route('notifications.index') }}">عرض جميع الإشعارات</a></li>
        @endauth
    </ul>
</li>
</div>