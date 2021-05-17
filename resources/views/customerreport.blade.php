<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DAVIDSON'S GENERAL CONTRACTORS</title>

  <link rel="icon" href="/dist/img/AdminLTELogo.jpg" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<br><br>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="/dist/img/AdminLTELogo.jpg" alt=""> Davidson's General Contractors.
          <small class="float-right">Date: <?php echo (new DateTime('tomorrow'))->format('d-m-Y');?> </script></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row --><br><br>
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, Inc.</strong><br>
          A108 Panampilly Nagar<br>
          Ernakulam, Kochi 683504<br>
          Phone: +91 9287 80 7568<br>
          Email: davidsongc54@example.com
        </address>
      </div>
      <!-- /.col -->
      
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b style="font-size:30px;">CUSTOMER REPORTS</b><br>
        <br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
        <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>OCCUPATION</th>
            <th>ADDRESS</th>
            <th>DOB</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $cust)
        <tr>
            <td>{{$cust->cust_id}}</td>
            <td>{{$cust->cust_name}}</td>
            <td>{{$cust->email}}</td>
            <td>{{$cust->phone}}</td>
            <td>{{$cust->occupation}}</td>
            <td>{{$cust->address}}</td>
            <td>{{$cust->dob}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
<html>