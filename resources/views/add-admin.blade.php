@include('header')

@include('navbar')

@include('sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: skyblue;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: red;">Add Admin Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/view" style="color: blue;">View</a></li>
              <li class="breadcrumb-item active" style="color: black;">Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- All Errors On The Top -->
        <!-- @if ($errors->any())
          <div class="validation-error">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
            @if ($errors->has('email'))
            @endif
          </div>
        @endif -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- Left col -->
              <section class="col-md-12 connectedSortable">
                <form method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="fname" style="color: blue;">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="{{old('fname') ? old('fname') : @$user->fname}}" placeholder="Enter Your First Name">
                        @error('fname')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="lname" style="color: blue;">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="{{old('lname') ? old('lname') : @$user->lname}}" placeholder="Enter Your Last Name">
                        @error('lname')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="username" style="color: blue;">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{old('username') ? old('username') : @$user->username}}" placeholder="Enter Your User Name">
                        @error('username')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email" style="color: blue;">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email') ? old('email') : @$user->email}}" placeholder="Enter Your Email Adress">
                        @error('email')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="pwd" style="color: blue;">Password</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" value="{{old('pwd') ? old('pwd') : @$user->pwd}}" placeholder="Enter Your Password">
                        @error('pwd')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="city" style="color: blue;">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{old('city') ? old('city') : @$user->city}}" placeholder="Enter Your City Name">
                        @error('city')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="state" style="color: blue;">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="{{old('state') ? old('state') : @$user->state}}" placeholder="Enter Your State Name">
                        @error('state')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="contact" style="color: blue;">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="{{old('contact') ? old('contact') : @$user->contact}}" placeholder="Enter Your Contact Number">
                        @error('contact')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="gender" style="color: blue;">Gender</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="gender" name="gender" value="Male"
                        {{ old('gender')=='Male' ? 'checked' : '' }} {{(@$user->gender=='Male') ? 'checked' : '' }}> Male
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="gender" name="gender" value="Female"
                        {{ old('gender')=='Female' ? 'checked' : '' }} {{(@$user->gender=='Female') ? 'checked' : '' }}> Female
                        @error('gender')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="birthdate" style="color: blue;">Birthdate</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="dd" id="dd">
                            <option value="">DD</option>
                            @for($i=1;$i<=31;$i++)
                                <option value="{{$i}}" 
                                {{ old('dd') == $i ? 'selected' : '' }} {{(@$birthdate[0] == $i) ? "selected" : "" }}>{{$i}}</option>
                            @endfor
                        </select>
                        &nbsp;&nbsp;
                        <select name="mm" id="mm">
                            <option value="">MM</option>
                            @for($i=1;$i<=12;$i++)
                                <option value="{{$i}}" 
                                {{ old('mm') == $i ? 'selected' : '' }} {{(@$birthdate[1] == $i) ? "selected" : "" }}>{{$i}}</option>
                            @endfor
                        </select>
                        &nbsp;&nbsp;
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
                      <div class="form-group">
                        <label for="hobby" style="color: blue;">Hobby</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="hobby[]" value="Music" 
                        {{ (is_array(old('hobby')) and in_array('Music', old('hobby'))) ? 'checked' : '' }}
                        @if(!empty($hobby)){ @if(@in_array('Music',@$hobby )) {{"checked" }}@endif }@endif > Music &nbsp;&nbsp;            
                        <input type="checkbox" name="hobby[]" value="Books" 
                        {{ (is_array(old('hobby')) and in_array('Books', old('hobby'))) ? 'checked' : '' }}
                        @if(!empty($hobby)){ @if(@in_array('Books',@$hobby )) {{"checked" }}@endif }@endif > Books &nbsp;&nbsp;
                        <input type="checkbox" name="hobby[]" value="Sports" 
                        {{ (is_array(old('hobby')) and in_array('Sports', old('hobby'))) ? 'checked' : '' }}
                        @if(!empty($hobby)){ @if(@in_array('Sports',@$hobby )) {{"checked" }}@endif }@endif > Sports &nbsp;&nbsp;
                        @error('hobby')
                            <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="image" style="color: blue;">Profile Image</label>
                        <div class="input-group">
                          <div class="custom-file col-md-11">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose Profile</label>
                          </div>
                          <div class="custom-file col-md-1">
                            @if(@$user->id) <img src="{{asset('upload/admin/images/'.@$user->image)}}" width="100px"> @endif
                          </div>
                        </div>
                        @error('image')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <center>
                          <input type="submit" class="btn btn-danger" name="submit" value="Add Admin">
                        </center> 
                      </div>
                  </form>
              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->   
              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
      <!-- /.content -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  </div>
  <!-- /.content-wrapper -->

@include('footer')