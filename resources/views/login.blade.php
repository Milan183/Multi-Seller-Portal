<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>M Square @ 13</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page" style="background-color: blue; color: aqua;">
<div class="login-box">
  <div class="login-logo">
    <a href="#" style="color: orange;"><b>Multi Seller Portal</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body"  style="background-color: orange;">
      <p class="login-box-msg" style="color: blue;">Sign in to start your session</p>

      <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" name="username" value="{{old('username') ? old('username') : @$user->username}}" placeholder="User Name" style="background-color: green; color: white;">
          @error('username')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text"style="background-color: black; color: white;">
              <span class="fas fa-tree"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="email" name="email" value="{{old('email') ? old('email') : @$user->email}}" placeholder="Email ID" style="background-color: green; color: white;">
          @error('email')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text"style="background-color: black; color: white;">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="pwd" name="pwd" value="{{old('pwd') ? old('pwd') : @$user->pwd}}" placeholder="Password" style="background-color: green; color: white;">
          @error('pwd')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text"style="background-color: black; color: white;">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <center><input type="submit" name="submit" value="Enter Now !" style="background-color: aqua; color: blue;" class="btn btn-block"></center>
      </form><br>
        <center><a href="/register" style="color: red;">New User have to Register First !</a></center>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
