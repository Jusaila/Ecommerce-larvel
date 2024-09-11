@extends('layouts-website.app')
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


   <!-- Main content -->
   <section class="content">
     <div class="container" style="padding-top: 50px;">
       <div class="row">
         <div class="col-md-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">Address List</h3>
             </div>
             <div class="card-header ">
                <a href="{{ route('address.create') }}"><button class="bg-success">Add New</button></a>
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
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Country</th>
                     <th>Company / House Name</th>
                     <th>Address</th>
                     <th>State</th>
                     <th>Pin Code</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Status</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                    @foreach ($address as $index=>$addres)
                    <tr>
                        <td>{{ $addres->id }}</td>
                        <td>{{ $addres->first_name }}</td>
                        <td>{{ $addres->last_name }}</td>
                        <td>{{ $addres->country }}</td>
                        <td>{{ $addres->house_name }}</td>
                        <td>{{ $addres->address }}</td>
                        <td>{{ $addres->state }}</td>
                        <td>{{ $addres->pincode }}</td>
                        <td>{{ $addres->email }}</td>
                        <td>{{ $addres->phone }}</td>



                        <td>
                            @if ($addres->status == 1)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('address.toggle-status', $addres->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="{{ $addres->status ? 0 : 1 }}">
                                <div class="form-check form-switch form-switch-success mb-3">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        role="switch"
                                        id="SwitchCheck{{ $addres->id }}"
                                        {{ $addres->status ? 'checked' : '' }}
                                        onclick="this.form.submit()"
                                    />
                                </div>
                            </form>
                        </td>
                        <td>

                            <form method="POST" action="{{ route("address.delete") }}"  onsubmit="return confirm('Do you want delete?')" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $addres->id }}">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                      </tr>
                    @endforeach



                 </tbody>
               </table>
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

{{-- <script>
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
</script> --}}

@endsection

