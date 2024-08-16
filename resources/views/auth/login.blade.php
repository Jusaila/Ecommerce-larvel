@extends('layouts-website.app')
@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        @if (@session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (@session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                        <div class="col-md-6">
                          <input type="email" class="form-control " id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <button type="submit" class="col-md-3 offset-md-5  btn btn-primary">Login</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection
