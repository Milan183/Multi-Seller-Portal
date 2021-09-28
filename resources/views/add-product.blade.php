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
            <h1 class="m-0" style="color: red;">Add Product Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/product/view" style="color: blue;">View</a></li>
              <li class="breadcrumb-item active" style="color: black;">Product</li>
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
                        <label for="title" style="color: blue;">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : @$user->title}}" placeholder="Enter Your Product Name">
                        @error('title')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="description" style="color: blue;">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{old('description') ? old('description') : @$user->description}}" placeholder="Enter Your Product Description">
                        @error('description')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="image" style="color: blue;">Product Image</label>
                        <div class="input-group">
                          <div class="custom-file col-md-11">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose Profile</label>
                          </div>
                          <div class="custom-file col-md-1">
                            @if(@$user->id) <img src="{{asset('upload/product/images/'.@$user->image)}}" width="100px"> @endif
                          </div>
                        </div>
                        @error('image')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="price" style="color: blue;">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{old('price') ? old('price') : @$user->price}}" placeholder="Enter Your Product Price">
                        @error('price')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="quantity" style="color: blue;">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" value="{{old('quantity') ? old('quantity') : @$user->quantity}}" placeholder="Enter Your Product Quantity">
                        @error('quantity')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="category_id" style="color: blue;">Category ID</label>
                        <input type="text" class="form-control" id="category_id" name="category_id" value="{{old('category_id') ? old('category_id') : @$user->category_id}}" placeholder="Enter Your Category ID">
                        @error('category_id')
                          <div class="validation-error" style="color: red;">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <center>
                          <input type="submit" class="btn btn-danger" name="submit" value="Add Product">
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