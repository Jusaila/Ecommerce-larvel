@extends('layouts-admin-panel.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Products</li>
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
              <h3 class="card-title">Edit Products</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="currentImage" value="{{ $data->image }}">
              <div class="card-body">
                <div class="form-group">
                  <label >Product Name</label>
                  <input type="text" class="form-control" placeholder="Enter Product Name" name="productName" value="{{ $data->name }}" >
                  @error('productName')
                  <span style="color: red;">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" placeholder="Enter Product Description" name="description" value="{{ $data-> description}}">
                    @error('description')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Category</label>
                    <select name="categoryId" class="form-control" >
                        <option value="">Choose...</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($data->category_id == $category->id) selected @endif>{{ $category->name }}</option>

                        @endforeach
                    </select>
                    @error('categoryId')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Price</label>
                    <input type="text" class="form-control" placeholder="Enter Price" name="price" value="{{ $data->price }}">
                    @error('price')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label >Image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Upload Your Photo" value="{{ $data->image }}">
                    <img style="width: 50px;height:50px;" src="{{ $data->image }}">
                    @error('image')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label >Size</label>
                    <select name="size" class="form-control" value="{{ $data->size }}">
                      <option value="">choose...</option>
                      <option value="XS" @if ($data->size == "XS") selected @endif>XS</option>
                      <option value="S" @if ($data->size == "S") selected @endif>S</option>
                      <option value="M" @if ($data->size == "M") selected @endif>M</option>
                      <option value="L" @if ($data->size == "L") selected @endif>L</option>
                      <option value="XL" @if ($data->size == "XL") selected @endif>XL</option>
                      <option value="XXL" @if ($data->size == "XXL") selected @endif>XXL</option>
                    </select>
                    @error('size')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Visible At</label>
                    <input type="date" class="form-control" placeholder="When the product visible" name="visible_at" value="{{ $data->visible_at }}">
                    @error('visible_at')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                 </div>


                <div class="form-group">
                  <label >Status</label>
                  <select name="status" class="form-control" value="{{ $data->status }}">
                    <option value="">choose...</option>
                    <option value="Active" @if ($data->status == "Active") selected @endif>Active</option>
                    <option value="Inactive" @if ($data->status == "Inactive") selected @endif>Inactive</option>
                  </select>
                  @error('status')
                  <span style="color: red;">{{ $message }}</span>
                  @enderror
                </div>

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

