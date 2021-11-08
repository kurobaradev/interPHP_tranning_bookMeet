 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
         <div class="sidebar-brand-text mx-3">Book Meet admin</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ Route('dashboard.index') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Pages Collapse Menu -->

     {{-- Quản lí người dùng --}}
     <li class="nav-item">
         <a class="nav-link collapsed" href="{{ Route('users.index') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Quản lí người dùng</span>
         </a>
     </li>
     {{-- end Quản lí người dùng --}}
     {{-- quản lí Quản lí phòng ban --}}
     <li class="nav-item">
         <a class="nav-link collapsed" href="{{ Route('department.index') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Quản lí phòng ban</span>
         </a>
     </li>
     {{-- end quản lí Quản lí phòng ban --}}

     {{-- quản lí Quản lí phòng họp --}}
     <li class="nav-item">
         <a class="nav-link collapsed" href="{{ Route('room-meet.index') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Quản lí phòng họp</span>
         </a>
     </li>
     {{-- end quản lí Quản lí phòng họp --}}
     {{-- quản lí Quản lí đặt lịch --}}
     <li class="nav-item">
         <a class="nav-link collapsed" href="#">
             <i class="fas fa-fw fa-table"></i>
             <span>Quản lí đặt lịch</span>
         </a>
     </li>
     {{-- end quản lí Quản lí đặt lịch --}}

 </ul>
 <!-- End of Sidebar -->
