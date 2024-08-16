@extends('layouts-website.app')
@section('content')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Blog</h1>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
                    <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="images/couch.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
<!-- Start Blog Section -->
<div class="blog-section">
    <div class="container">

        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-5">
                <div class="post-entry">
                    <a href="" class="post-thumbnail"><img src="{{ $product->image }}" alt="Image" class="img-fluid" style="height: 300px;width:250px;"></a>
                    <div class="post-content-entry">
                        <h3><a href="#">{{ $product->name }}</a></h3>
                        <div class="meta">
                            <span> <a href="">{{ $product->categoryName }}</a></span> <span>Released On  <a href="">{{date('d-m-Y',strtotime($product->visible_at))}}</a></span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>
<!-- End Blog Section -->


@endsection
