@extends('layouts.headcust')
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
          <li class="nav-item menu-open">
            <a href="/cust" class="nav-link active">
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
            <h1 class="m-0">Welcome, {{$LoggedUserInfo['cust_name']}}.</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/cust">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <center>

              <!-- /.card-header -->
              <section class="content">
              <div class="container-fluid">
              <div class="card-body">
              <div class="card" style="padding:20px;">
             @if($bid==NULL)

             @else
              @if($bid->b_date > Carbon\Carbon::today())
              @if($bid->status=="Rejected")
              

              
              <button type="button" class="btn bg-primary btn-sm" data-toggle="modal" data-target="#modal-default" style="max-width:140px;">
                  Appointment Status
                </button><br>
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Dear {{$LoggedUserInfo['cust_name']}}, </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>We're really sorry to let you know that due to some unforseen circumstances we are forced to <b>not accept the appointment</b> <br>on {{$bid->b_date}} . <br>
                We know how valuable your time is and we want to apologize for the conflict and any inconvenience this may cause.<br>
              <b>Kindly choose another date for the appointment.</b></p>
                If you have any concerns, please don't hesitate to get in touch with us 
                <i class="fa fa-phone"></i> &nbsp; 9287807568 <br><i class="fa fa-envelope"></i> &nbsp; davidsongc54@example.com 
                <br>
                Looking forward to meeting you &hellip;
              <br><br>Regards
            <br><b>Davidson's General Contractors</b>
                
            </div>
            <div class="modal-footer justify-content-between">
            <a href="/booking" ><button class="btn btn-primary">Book Appointment</button></a>
              <button type="button" class="btn btn-default bg-danger" data-dismiss="modal">Close</button>
            </div>
          </div></div></div>

              @elseif($bid->status=="Booking Confirmed")

              <button type="button" class="btn bg-primary btn-sm" data-toggle="modal" data-target="#modal-default" style="max-width:140px;">
                  Appointment Status
                </button><br>
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Dear {{$LoggedUserInfo['cust_name']}}, </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Thanks for Choosing Davidson's GC. <br>We're glad to let you know that Your Appointment has confirmed on {{$bid->b_date}} .
                We'll contact you for further details.<br></p>
                If you have any concerns, please don't hesitate to get in touch with us <i class="fa fa-phone"></i> &nbsp; 9287807568 <br><i class="fa fa-envelope"></i> &nbsp; davidsongc54@example.com 
                <br>
                Looking forward to meeting you there&hellip;
              <br><br>Regards
            <br><b>Davidson's General Contractors</b>
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default bg-danger" data-dismiss="modal">Close</button>
            </div>
          </div></div></div>
          @endif
          @endif
          @endif
         
          
              <div class="card card-success">
              <div class="row">
              
            <div class="col-md-12 col-lg-6 col-xl-4 ">
                <div class="card mb-2">
                  <img class="card-img-top" src="/assets/img/res.jpg" alt="Dist Photo 2">
                  <div class="card-img-overlay d-flex flex-column justify-content-center">
                  <h5 class="card-title  pt-2 mt-5 btn btn-light" style="opacity:0.8; max-width:300px;">Trusted Building Partners</h5>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="../dist/img/photo2.png" alt="Dist Photo 2">
                  <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h5 class="card-title mt-5 pt-2 btn btn-light" style="opacity:0.8; max-width:300px;">Commitment to our Clients</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="/dist/img/photo3.jpg" alt="Dist Photo 2">
                  <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h5 class="card-title mt-5 pt-2 btn btn-light" style="opacity:0.8; max-width:300px;">Certified experience / professionals </h5>

                  </div>
                </div>
              </div>
              
            </div>
              <p><h6>Welcome to Davidson's General Contractors, We’re experts in building out 
            spaces that meet the needs of our clients’ unique vision.<br>
            As a company, we are incredibly proud to be considered one of the best building contractors. 
              <br><br>Looking to build a new home? You can make an appointment with us today !</h6></p>
          </span>
          
          <center><a href="/booking" class="btn btn-block bg-gradient-warning btn-lg"  style="max-width:200px;">Book Appointment</a>
          </center><br>
            <!-- /.col-md-6 -->
            <section id="lm" >
        <div class="row" id="">
          <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0"><h3 class="card-title">Our Material Details</h3></div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead class="table-success">
                  <tr>
                            <th>ID</th>
                            <th>Material</th>
                            <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  @foreach($mat as $m)
                <tr>
                        <td>{{$m->mat_id}}</td>
                        <td>{{$m->mat_name}}</td>
                        <td>{{$m->rate}}</td>
                </tr>
        @endforeach
                 
                  </tbody>
                </table>
              </div>
            </div></div>
            <!-- /.card -->
        
            <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Our Labor Details</h3></div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead class="table-success">
                  <tr>
                          <th>ID</th>
                          <th>Labor</th>
                          <th>Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  @foreach($labor as $l)
                  <tr>
                      <th scope="row" >{{$l->l_id}}</td>
                      <td>{{$l->l_type}}</td>
                      <td>{{$l->Amount}}</td> 
                  </tr>
                  @endforeach
                 
                  </tbody>
                </table></section>
              </div></div></div>
              </div>
            
            <!-- /.card -->
            
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












