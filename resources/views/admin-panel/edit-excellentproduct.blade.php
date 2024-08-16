@extends('layouts-admin-panel.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Home Banner</li>
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
              <h3 class="card-title">Add Home Banner</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('excellent-product.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="currentImage" value="{{ $data->image }}">
                <div class="card-body">
                    <div class="form-group">
                      <label >Product</label>
                      <select name="productId" id="productId"class="form-control">
                        <option value="" >choose...</option>
                        @foreach ($products as $product)
                            <option value="{{$product->id}}" @if($data->product_id == $product->id) selected @endif >{{ $product->name }}</option>
                        @endforeach
                      </select>
                      @error('product_id')
                      <span style="color: red;">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label >Status</label>
                      <select name="status" class="form-control" >
                        <option value="">choose...</option>
                        <option value="Active" @if ($data->status == "Active") selected @endif>Active</option>
                        <option value="Inactive"  @if ($data->status == "Inactive") selected @endif>Inactive</option>
                      </select>
                      @error('status')
                      <span style="color: red;">{{ $message }}</span>
                      @enderror
                    </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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

