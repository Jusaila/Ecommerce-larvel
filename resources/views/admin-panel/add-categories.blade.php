@extends('layouts-admin-panel.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8 mx-auto">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Categories</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('category.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" class="form-control" placeholder="Enter Name" name="categoryName">
                  @error('categoryName')
                  <span style="color: red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label >Image</label>
                    <input type="file" class="form-control" placeholder="Upload product Image" name="image">
                    @error('image')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label >Status</label>
                  <select name="status" id=""class="form-control" name="status">
                    <option value="">choose...</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                  @error('status')
                  <span style="color: red;">{{ $message }}</span>
                  @enderror
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
          <!-- /.card -->


        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


</div>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection

