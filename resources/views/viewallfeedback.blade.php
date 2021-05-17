@extends('layouts.headadm')
@section("content")

<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Home</a>
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
        <a href="{{route('logout')}}">
        <button class="btn btn-dark btn-sm" type="logout">
                  logout
                </button></a>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="dist/img/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text" style="font-size:28px;"><strong>DGC<span style="color:#ffc451;">.</span></strong> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/admin" class="d-block">Admin</a>
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
          <li class="nav-item ">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/addlabor" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Labor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/addmaterial" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Material
              </p>
            </a>
          <li class="nav-item">
            <a href="/addconst" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Constructions
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="/works" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
                  <p>Works</p>
                </a>
              </li>
          <li class="nav-item  menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/viewallcustomers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/viewallbooking" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bookings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/viewfball" class="nav-link   active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feedbacks</p>
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
            <h1 class="m-0">CUSTOMER FEEDBACKS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Reports</a></li>
              <li class="breadcrumb-item active">Feedbacks</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">

<!-- Default box -->

<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
      @foreach($feedback as $fdb)
        <div class="card bg-light d-flex flex-fill">
          <div class="card-header text-muted border-bottom-0">
            Client
          </div>
          
          <div class="card-body pt-0">
          
            <div class="row">
              <div class="col-7">
                <h2 class="lead"><b>{{optional($fdb->customer)->cust_name}}</b></h2>
                <p class="text-muted text-sm"><b>Booking ID: </b> {{$fdb->id}} </p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li><span class="fa-li"><i class="fas fa-lg fa-comments"></i></span> <strong>{{$fdb->feedback}}</strong></li>
                  <li><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span>{{ \Carbon\Carbon::parse( $fdb->date)->format('d/m/Y')}}</li>
                </ul>
                
              </div>
              <div class="col-5 text-center">
                <img src="/dist/img/fb.png" alt="user-avatar" class="img-circle img-fluid">
              </div>
            </div>
          </div>
          </div>
          @endforeach
        
      </div>
      </div>
      </div>
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