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
            <h1 class="m-0" style="color: red;">Add Category Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/category/view" style="color: blue;">View</a></li>
              <li class="breadcrumb-item active" style="color: black;">Category</li>
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
                        <label for="cname" style="color: blue;">Category Name</label>
                        <input type="text" class="form-control" id="cname" name="cname" value="{{old('cname') ? old('cname') : @$user->cname}}" placeholder="Enter Your Category Name">
                        @error('cname')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="image" style="color: blue;">Category Image</label>
                        <div class="input-group">
                          <div class="custom-file col-md-11">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose Profile</label>
                          </div>
                          <div class="custom-file col-md-1">
                            @if(@$user->id) <img src="{{asset('upload/category/images/'.@$user->image)}}" width="100px"> @endif
                          </div>
                        </div>
                        @error('image')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="brand_id" style="color: blue;">Brand ID</label>
                        <input type="text" class="form-control" id="brand_id" name="brand_id" value="{{old('brand_id') ? old('brand_id') : @$user->brand_id}}" placeholder="Enter Your Brand ID">
                        @error('brand_id')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <center>
                          <input type="submit" class="btn btn-danger" name="submit" value="Add Category">
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