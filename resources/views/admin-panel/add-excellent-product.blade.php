@extends('layouts-admin-panel.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Excellent Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Excellent Products</li>
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
              <h3 class="card-title">Add Excellent Products</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('excellent-product.save') }}" method="POST" >
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label >Product</label>
                  <select name="productId" id="productId"class="form-control">
                    <option value="" >choose...</option>
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{ $product->name }}</option>
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

