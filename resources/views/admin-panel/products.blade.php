@extends('layouts-admin-panel.app')
@section('content')
<style>
    .success-message {
           color: green;
           font-weight: bold;
       }

       .error-message {
           color: red;
           font-weight: bold;
       }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Product</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Product</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">Product List</h3>
             </div>
             <div class="card-header ">
                <a href="{{ route('add-products') }}"><button class="bg-success">Add New</button></a>
              </div>
             <!-- /.card-header -->
             @if(session('success'))
            <div class="success-message" id="flash-message">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
                <div class="error-message"id="flash-message" >
                    {{ session('error') }}
                </div>
            @endif
             <div class="card-body">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">Id</th>
                     <th>Product Name</th>
                     <th>Description</th>
                     <th>Category</th>
                     <th>Image</th>

                     <th>Price</th>
                     <th>Size</th>
                     <th>Visible At</th>

                     <th>Status</th>
                     <th>Action</th>



                   </tr>
                 </thead>
                 <tbody>
                    @foreach ($products as $index=>$product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->categoryName }}</td>
                        <td><img style="width: 50px;height:50px;" src="{{ $product->image }}"></td>
                        <td>₹ {{ $product->price }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{date('d-m-Y',strtotime($product->visible_at))}}</td>


                        <td>
                            @if ($product->status == "Active")
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-info view-details" data-toggle="modal" data-target="#exampleModal" data-index="{{ $index }}">
                                View
                               </button>

                            <form method="POST" action="{{ route("product.delete") }}"  onsubmit="return confirm('Do you want delete?')" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            <a href="{{ url('edit-products/'.$product->id) }}"><button class="btn btn-primary">Edit</button></a>
                        </td>
                      </tr>
                    @endforeach



                 </tbody>
               </table>
             </div>
             <!-- /.card-body -->
             <div class=" clearfix">
               <ul class="pagination pagination-sm m-0 float-right">
                 <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                 <li class="page-item"><a class="page-link" href="#">1</a></li>
                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                 <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
               </ul>
             </div>
           </div>

         </div>

         <!-- /.col -->
       </div>

     </div><!-- /.container-fluid -->
   </section>

 </div>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header float-right">
            <h2 class="mb-4">View products</h2>
          <div class="text-right">
            <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
          </div>
        </div>
        <div class="modal-body">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img style="width: 200px;height:200px;" src="" id="image">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Product Name</label>
                            <p id="name">pant</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <p id="description">Description</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">price</label>
                            <p id="price">300</p>
                        </div>

                    </div>
                </div>
            </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script src="{{('Table V01_files/jquery-3.2.1.min.js')}}"></script>

<script src="{{('Table V01_files/popper.js')}}"></script>
<script src="{{('Table V01_files/bootstrap.min.js')}}"></script>

<script src="{{('Table V01_files/select2.min.js')}}"></script>

<script src="{{('Table V01_files/main.js')}}"></script>

<script async="" src="./Table V01_files/js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
        $(document).ready(function() {
            var productList = @json($products);
            $('.view-details').on('click', function() {
                var index = $(this).data('index');
                var product = productList[index];
                $('#name').text(product.name);
                $('#description').text(product.description);
                $('#price').text(product.price);
                $('#image').attr('src',product.image);

                console.log(product);
            });
        });
</script>

@endsection
