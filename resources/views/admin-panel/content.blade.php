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
           <h1>Banner</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
             <li class="breadcrumb-item active">Add Content Type</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">

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
         <div class="col-md-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">Content Type List</h3>
             </div>
             <div class="card-header ">
                <a href="{{ route('content.create')}}"><button class="bg-success">Add New</button></a>
              </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th style="width: 10px">Id</th>
                     <th>Name</th>

                     <th>Operations</th>
                   </tr>
                 </thead>
                 <tbody>
                    @foreach ($contents as $index=>$content)
                    <tr>
                        <td>{{ $content->id }}</td>
                        <td>{{ $content->name }}</td>

                        {{-- <td>
                            <button type="button" class="btn btn-info view-details" data-toggle="modal" data-target="#exampleModal" data-index="{{ $index }}">
                                View
                               </button>

                            <form method="POST" action="{{ route('banner-delete') }}"  onsubmit="return confirm('Do you want delete?')" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $content->id }}">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            <a href="{{ url('banner/edit/'.$content->id) }}"><button class="btn btn-primary">Edit</button></a>
                        </td> --}}
                      </tr>
                    @endforeach

                 </tbody>
               </table>
             </div>
             <!-- /.card-body -->
             <div class="card-footer clearfix">
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
   <!-- /.content -->
 </div>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label class="form-label">ID</label>
                            <p id="id"></p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Heading</label>
                            <p id="heading"></p>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Content</label>
                            <p id="content"></p>
                        </div>


                    </div>
                </div>
            </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- <script src="{{('Table V01_files/jquery-3.2.1.min.js')}}"></script>

  <script src="{{('Table V01_files/popper.js')}}"></script>
  <script src="{{('Table V01_files/bootstrap.min.js')}}"></script>

  <script src="{{('Table V01_files/select2.min.js')}}"></script>

  <script src="{{('Table V01_files/main.js')}}"></script>

  <script async="" src="./Table V01_files/js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var BannerList = @json($banners);
            $('.view-details').on('click',function(){
                var index = $(this).data('index');
                var Banner = BannerList[index];
                $('#id').text(Banner.id);
                $('#heading').text(Banner.heading);
                $('#content').text(Banner.content);
                $('#image').attr('src',Banner.image);
                console.log(Banner);
            });
             });
    </script> --}}

@endsection
