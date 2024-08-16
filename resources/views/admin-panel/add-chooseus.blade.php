@extends('layouts-admin-panel.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Why Choose Us </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Why Choose Us </li>
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
              <h3 class="card-title">Add Why Choose Us </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('chooseus.save')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">

                <div class="form-group">
                    <label >Icon</label>
                    <input type="file" class="form-control" placeholder="Upload product icon" name="icon">
                    @error('icon')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Sub-Heading</label>
                    <input type="text" class="form-control" placeholder="Enter Sub-Heading" name="sub-heading">
                    @error('sub-heading')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label >Sub-Content</label>
                      <input type="text" class="form-control" placeholder="Enter Sub-Content" name="sub-content">
                      @error('sub-content')
                      <span style="color: red;">{{ $message }}</span>
                      @enderror
                  </div>






                <div class="form-group">
                  <label >Status</label>
                  <select name="status" class="form-control" >
                    <option value="">choose...</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
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

