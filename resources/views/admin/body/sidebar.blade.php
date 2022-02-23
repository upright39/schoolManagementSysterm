@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp


<aside class="main-sidebar">
 <!-- sidebar-->
 <section class="sidebar">

  <div class="user-profile">
   <div class="ulogo">
    <a href="{{route('dashboard')}}">
     <!-- logo for regular state and mobile devices -->
     <div class="d-flex align-items-center justify-content-center">
      <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
      <h3><b>Upsman</b> Dashboard</h3>
     </div>
    </a>
   </div>
  </div>

  <!-- sidebar menu-->
  <ul class="sidebar-menu" data-widget="tree">

   <li class="{{($route == 'dashboard')?'active':''}}">
    <a href=" {{route('dashboard')}}">
     <i data-feather=" pie-chart"></i>
     <span>Dashboard</span>
    </a>
   </li>

   <li class="treeview {{($prefix == '/users')?'active':''}}     ">
    <a href="#">
     <i data-feather="message-circle"></i>
     <span>Manage User</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
     </span>
    </a>
    <ul class="treeview-menu">
     <li><a href="{{route('view_users')}}"><i class="ti-more"></i>All Users</a></li>
     <li><a href="{{route('add_user')}}"><i class="ti-more"></i>Add User</a></li>
    </ul>
   </li>

   <li class="treeview {{($prefix == '/profile')?'active':''}}">
    <a href="#">
     <i data-feather="mail"></i> <span>Manage Profile</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
     </span>
    </a>
    <ul class="treeview-menu">
     <li><a href="{{route('view.profile')}}"><i class="ti-more"></i>View Profile</a></li>
     <li><a href="{{route('edithPassword')}}"><i class="ti-more"></i>Change Passwoord</a></li>

    </ul>
   </li>
   <li class="treeview {{($prefix == '/setups')?'active':''}}">
    <a href="#">
     <i data-feather="mail"></i> <span>Setup Management</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
     </span>
    </a>
    <ul class="treeview-menu">
     <li><a href="{{route('view.class')}}"><i class="ti-more"></i>Studnt Class</a></li>
     <li><a href="{{route('view.year')}}"><i class="ti-more"></i>Studnt Year</a></li>
     <li><a href="{{route('view.group')}}"><i class="ti-more"></i>Studnt Group</a></li>
     <li><a href="{{route('view.shift')}}"><i class="ti-more"></i>Studnt Shift</a></li>
     <li><a href="{{route('view.feecategory')}}"><i class="ti-more"></i>Studnt Fee Category</a></li>
     <li><a href="{{route('view.feecategoryamount')}}"><i class="ti-more"></i>Studnt Fee Category Amount</a></li>
    </ul>
   </li>


   <li class="header nav-small-cap">User Interface</li>

   <li class="treeview">
    <a href="#">
     <i data-feather="grid"></i>
     <span>Components</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
     </span>
    </a>
    <ul class="treeview-menu">
     <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
     <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>


    </ul>
   </li>

   <li class="treeview">
    <a href="#">
     <i data-feather="credit-card"></i>
     <span>Cards</span>
     <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
     </span>
    </a>
    <ul class="treeview-menu">
     <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
     <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>

    </ul>
   </li>

  </ul>
 </section>

 <div class="sidebar-footer">
  <!-- item-->
  <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
   aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
  <!-- item-->
  <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
    class="ti-email"></i></a>
  <!-- item-->
  <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
    class="ti-lock"></i></a>
 </div>
</aside>