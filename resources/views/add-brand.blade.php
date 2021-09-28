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
            <h1 class="m-0" style="color: red;">Add Brand Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/brand/view" style="color: blue;">View</a></li>
              <li class="breadcrumb-item active" style="color: black;">Brand</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

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
                        <label for="bname" style="color: blue;">Brand Name</label>
                        <input type="text" class="form-control" id="bname" name="bname" value="{{old('bname') ? old('bname') : @$user->bname}}" placeholder="Enter Your Brand Name">
                        @error('bname')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="image" style="color: blue;">Brand Image</label>
                        <div class="input-group">
                          <div class="custom-file col-md-11">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose Profile</label>
                          </div>
                          <div class="custom-file col-md-1">
                            @if(@$user->id) <img src="{{asset('upload/brand/images/'.@$user->image)}}" width="100px"> @endif
                          </div>
                        </div>
                        @error('image')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="seller_id" style="color: blue;">Seller ID</label>
                        <input type="text" class="form-control" id="seller_id" name="seller_id" value="{{old('seller_id') ? old('seller_id') : @$user->seller_id}}" placeholder="Enter Your Seller ID">
                        @error('seller_id')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <center>
                          <input type="submit" class="btn btn-danger" name="submit" value="Add Brand">
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