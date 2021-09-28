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
<body class="hold-transition register-page" style="background-color: green;"><br>
<div class="register-box">
  <div class="register-logo">
    <a href="#" style="color: white;"><b>Multi Seller Portal</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body" style="background-color: blue;">
      <h4 class="login-box-msg" style="color: yellow;">Registration form</h4>
      <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="fname" name="fname" value="{{old('fname') ? old('fname') : @$user->fname}}" placeholder="Enter Your First Name"  style="background-color: yellow; color: blue;">
            @error('fname')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: purple; color: white;">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="lname" name="lname" value="{{old('lname') ? old('lname') : @$user->lname}}" placeholder="Enter Your Last Name" style="background-color: yellow; color: blue;">
            @error('lname')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: purple; color: white;">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username" name="username" value="{{old('username') ? old('username') : @$user->username}}" placeholder="Enter Your User Name" style="background-color: yellow; color: blue;">
            @error('username')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: purple; color: white;">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="email" name="email" value="{{old('email') ? old('email') : @$user->email}}" placeholder="Enter Your Email Address" style="background-color: yellow; color: blue;">
            @error('email')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: brown; color: white;">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="pwd" name="pwd" value="{{old('pwd') ? old('pwd') : @$user->pwd}}" placeholder="Enter Your Password" style="background-color: yellow; color: blue;">
            @error('pwd')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: brown; color: white;">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="city" name="city" value="{{old('city') ? old('city') : @$user->city}}" placeholder="Enter Your City" style="background-color: yellow; color: blue;">
            @error('city')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: black; color: white;">
              <span class="fas fa-tree"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="state" name="state" value="{{old('state') ? old('state') : @$user->state}}" placeholder="Enter Your State" style="background-color: yellow; color: blue;">
            @error('state')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: black; color: white;">
              <span class="fas fa-tree"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="contact" name="contact" value="{{old('contact') ? old('contact') : @$user->contact}}" placeholder="Enter Your Contact Number" style="background-color: yellow; color: blue;">
            @error('contact')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: black; color: white;">
              <span class="fas fa-tree"></span>
            </div>
          </div>
        </div>
        <div class="form-group" style="color: white;">
          <label for="gender">Gender</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" id="gender" name="gender" value="Male"
          {{ old('gender')=='Male' ? 'checked' : '' }} {{(@$user->gender=='Male') ? 'checked' : '' }}> Male
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" id="gender" name="gender" value="Female"
          {{ old('gender')=='Female' ? 'checked' : '' }} {{(@$user->gender=='Female') ? 'checked' : '' }}> Female
          @error('gender')
            <div class="validation-error" style="color: red;">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group" style="color: white;">
          <label for="birthdate" style="color: white;">Birthdate</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="dd" id="dd">
              <option value="">DD</option>
              @for($i=1;$i<=31;$i++)
                <option value="{{$i}}" 
                {{ old('dd') == $i ? 'selected' : '' }} {{(@$birthdate[0] == $i) ? "selected" : "" }}>{{$i}}</option>
              @endfor
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="mm" id="mm">
              <option value="">MM</option>
              @for($i=1;$i<=12;$i++)
                <option value="{{$i}}" 
                {{ old('mm') == $i ? 'selected' : '' }} {{(@$birthdate[1] == $i) ? "selected" : "" }}>{{$i}}</option>
              @endfor
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="yy" id="yy">
              <option value="">YYYY</option>
              @for($i=1990;$i<=date("Y");$i++)
                <option value="{{$i}}" 
                {{ old('yy') == $i ? 'selected' : '' }} {{(@$birthdate[2] == $i) ? "selected" : "" }}>{{$i}}</option>
              @endfor
            </select>
            @error('dd')
              <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
            @error('mm')
              <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
            @error('yy')
              <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group" style="color: white;">
          <label for="hobby" style="color: white;">Hobby</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="hobby[]" value="Music" 
            {{ (is_array(old('hobby')) and in_array('Music', old('hobby'))) ? 'checked' : '' }}
            @if(!empty($hobby)){ @if(@in_array('Music',@$hobby )) {{"checked" }}@endif }@endif > Music 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="hobby[]" value="Books" 
            {{ (is_array(old('hobby')) and in_array('Books', old('hobby'))) ? 'checked' : '' }}
            @if(!empty($hobby)){ @if(@in_array('Books',@$hobby )) {{"checked" }}@endif }@endif > Books 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="hobby[]" value="Sports" 
            {{ (is_array(old('hobby')) and in_array('Sports', old('hobby'))) ? 'checked' : '' }}
            @if(!empty($hobby)){ @if(@in_array('Sports',@$hobby )) {{"checked" }}@endif }@endif > Sports
            @error('hobby')
              <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="input-group">
              <div class="custom-file col-md-12">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image" style="background-color: yellow;">Choose Profile Image</label>
              </div>
            </div>
            @error('image')
              <div class="validation-error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <center><input type="submit" name="submit" value="Register Now" style="background-color: aqua; color: blue;" class="btn btn-block"></center>
      </form><br>
        <center><a href="/login" style="color: yellow;">Click Here for Go Back to The Login Page !</a></center>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  <br>
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
</body>
</html>