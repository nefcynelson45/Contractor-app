@extends('layouts.headcust')
@section("content")
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/cust" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <a href="{{route('auth.logout')}}">
        <button class="btn btn-dark btn-sm" type="logout" onclick="return confirm('Do You Really want to Logout?');">
                  logout
                </button></a>


      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/cust" class="brand-link">
    <img src="/dist/img/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text" style="font-size:28px;"><strong>DGC<span style="color:#ffc451;">.</span></strong> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/profile/{{$LoggedUserInfo['cust_id']}}/edit" class="d-block">{{$LoggedUserInfo['cust_name']}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/cust" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/booking" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Appointment
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/viewbooking" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appointments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/viewfb" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feedback</p>
                </a>
              </li>
            </ul>
          </li>
          </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/cust">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <form action="/profileeditprocess/{{$cust->cust_id}}" method="post">
                {{csrf_field()}}
                <label class="lead" ><strong> Name  :</strong></label>
                <input type="text"  id="name" style="max-width:100%;" name="cust_name" class="app-form-control form-control @error('name') is-invalid @enderror"  placeholder="Name" value="{{$cust->cust_name}}" required autocomplete="name" autofocus>
                 @error('name')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label class="lead" ><strong> Email :</strong></label>
                <input type="email" id="email" name="cust_email" class="app-form-control @error('email') is-invalid @enderror form-control" style="max-width:100%;"  placeholder="Email"  value="{{$cust->email}}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="lead" ><strong> Phone :</strong></label>
                <input type="number" id="phone" name="phone" class="app-form-control @error('Phone') is-invalid @enderror form-control" style="max-width:100%;"  placeholder="Phone No." value="{{$cust->phone}}" required autocomplete="phone">
                <label class="lead" ><strong> Occupation :</strong></label>
                <input type="text"  name="occupation" class="app-form-control form-control" style="max-width:100%;"  placeholder="occupation" value="{{$cust->occupation}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="lead" ><strong> Address :</strong></label>
                <textarea name="address" class="app-form-control form-control" style="max-width:100%;"  id="" cols="10" rows="10" placeholder="Address" value="" required >{{$cust->address}}</textarea>
                <label class="lead" ><strong> Date Of Birth :</strong></label>
                <input type="date"  name="dob" class="app-form-control @error('Phone') is-invalid @enderror form-control" style="max-width:100%;" placeholder="dob" value="{{$cust->dob}}" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="lead" ><strong> Password :</strong></label>
                <input id="password" type="password" name="password" class="app-form-control @error('password') is-invalid @enderror form-control" style="max-width:100%;" placeholder="Password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <label class="lead" ><strong> Confirm Password :</strong></label>
                <input id="password-confirm" type="password" class="app-form-control form-control" style="max-width:100%;" name="cpwd" placeholder="Confirm Password" required autocomplete="new-password">
                </div>
              </div>
              </div>
              <center><button class="btn btn-primary">Update Profile</button></center>
                </form>


  </div>
             
 

 <!-- /.card-body -->
 </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


