
<style>
@import url('https://fonts.googleapis.com/css?family=Numans');

*, *:before, *:after {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

body {
  background-image: url(https://getdigitalexperts.com/wp-content/uploads/2017/02/computer.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  font-size: 12px;
  font-family: 'Numans', sans-serif;
}
.navc{
height: 60px;
margin-top: auto;
margin-bottom: auto;
width: 100%;
background-color: rgba(0,0,0,0.5) !important;
}
body, button, input {

  font-weight: 700;
  letter-spacing: 1.4px;
}

.background {
  display: flex;
  min-height: 100vh;
}

.container {
  flex: 0 1 1000px;
  margin: auto;
  padding: 10px;
}

.screen {
  position: relative;
  background-color: rgba(0,0,0,0.8);
  border-radius: 15px;

}

.screen:after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 20px;
  right: 20px;
  bottom: 0;
  border-radius: 15px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, .4);
  z-index: -1;
}

.screen-header {
  display: flex;
  align-items: center;
  padding: 10px 20px;
  background: #4d4d4f;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}

.screen-header-left {
  margin-right: auto;
}

.screen-header-button {
  display: inline-block;
  width: 8px;
  height: 8px;
  margin-right: 3px;
  border-radius: 8px;
  background: white;
}

.screen-header-button.close {
  background: #ed1c6f;
}

.screen-header-button.maximize {
  background: #e8e925;
}

.screen-header-button.minimize {
  background: #74c54f;
}

.screen-header-right {
  display: flex;
}

.screen-header-ellipsis {
  width: 3px;
  height: 3px;
  margin-left: 2px;
  border-radius: 8px;
  background: #999;
}

.screen-body {
  display: flex;
}

.screen-body-item {
  flex: 1;
  padding: 50px;
}

.screen-body-item.left {
  display: flex;
  flex-direction: column;
}

.app-title {
  display: flex;
  flex-direction: column;
  position: relative;
  color: #ebde34;
  font-size: 26px;
}

.app-title:after {
  content: '';
  display: block;
  position: absolute;
  left: 0;
  bottom: -10px;
  width: 25px;
  height: 4px;
  background: #ebde34;
}

.app-contact {
  margin-top: auto;
  font-size: 8px;
  color: #888;
}

.app-form-group {
  margin-bottom: 15px;
}

.app-form-group.message {
  margin-top: 40px;
}

.app-form-group.buttons {
  margin-bottom: 0;
  text-align: right;
}

.app-form-control {
  width: 100%;
  padding: 10px 0;
  background: none;
  border: none;
  border-bottom: 1px solid #666;
  color: #ddd;
  font-size: 14px;
  outline: none;
  transition: border-color .3s;
}

.app-form-control::placeholder {
  color: #666;
}

.app-form-control:focus {
  border-bottom-color: #ddd;
}

.app-form-button {
  background: none;
  border: none;
  color: #ebde34;
  font-size: 14px;
  cursor: pointer;
  outline: none;
}

.app-form-button:hover {
  color: #ffffff;
}

.credits {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
  color: #ffa4bd;

  font-size: 16px;
  font-weight: normal;
}

.credits-link {
  display: flex;
  align-items: center;
  color: #fff;
  font-weight: bold;
  text-decoration: none;
}

.dribbble {
  width: 20px;
  height: 20px;
  margin: 0 5px;
}

@media screen and (max-width: 520px) {
  .screen-body {
    flex-direction: column;
  }

  .screen-body-item.left {
    margin-bottom: 30px;
  }

  .app-title {
    flex-direction: row;
  }

  .app-title span {
    margin-right: 12px;
  }

  .app-title:after {
    display: none;
  }
}

@media screen and (max-width: 600px) {
  .screen-body {
    padding: 40px;
  }

  .screen-body-item {
    padding: 0;
  }
}

</style>
@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <link rel="icon" href="/dist/img/AdminLTELogo.jpg" type="image/x-icon">
    @extends('layouts.header')

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center justify-content-lg-between navc" >

    <h1 class="logo me-auto me-lg-0"><a href="/">DGC<span>.</span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="/" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto" href="/">Home</a></li>
        <li><a class="nav-link scrollto" href="/#about">About</a></li>
        <li><a class="nav-link scrollto" href="/#services">Services</a></li>
        <li><a class="nav-link scrollto" href="/#portfolio">Projects</a></li>
        <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->
    <a href="{{route('auth.login')}}" class="get-started-btn scrollto">Sign In</a>


  </div>
</header>


<br><br><br><br>

<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>SIGN UP</span>
            <span>HERE !</span>
          </div>
          <div class="app-contact">CONTACT INFO : +91 7756 4436 08</div>
        </div>
        <div class="screen-body-item">
          <form action="{{route('auth.regist')}}" method="post">
          @csrf

          @if(Session::get('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
          @endif
          @if(Session::get('fail'))
          <div class="alert alert-danger">
            {{Session::get('fail')}}
          </div>
          @endif

          <div class="app-form">
            <div class="app-form-group">
            <input type="text"  id="name" name="cust_name" class="app-form-control  @error('name') is-invalid @enderror"  placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="app-form-group">
            <input type="email" id="email" name="cust_email" class="app-form-control @error('email') is-invalid @enderror"  placeholder="Email"  value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="app-form-group">
            <input type="number" id="phone" name="phone" class="app-form-control @error('Phone') is-invalid @enderror"  placeholder="Phone No." value="{{ old('phone') }}" required autocomplete="phone">
            </div>
            <div class="app-form-group">
            <input type="text"  name="occupation" class="app-form-control"  placeholder="occupation" required>
            </div>
            <div class="app-form-group  message">
            <textarea name="address" class="app-form-control"  id="" cols="10" rows="10" placeholder="Address" required ></textarea>
            </div>
            <div class="app-form-group">
            <label class="lead" >Date of Birth</label>
            </div>
            <div class="app-form-group">
            <input type="date"  name="dob" max="2000-12-31" class="app-form-control @error('Phone') is-invalid @enderror" placeholder="dob" required>
            </div>
            <div class="app-form-group">
            <input id="password" type="password" name="password" class="app-form-control @error('password') is-invalid @enderror"  placeholder="Password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="app-form-group">
            <input id="password-confirm" type="password" class="app-form-control" name="cpwd" placeholder="Confirm Password" required autocomplete="new-password">
            </div>
            
            <div class="app-form-group buttons">
              <button class="app-form-button" type="reset">CANCEL</button>
              <button class="app-form-button">SIGN UP</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div> 
  </div>
</div>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>