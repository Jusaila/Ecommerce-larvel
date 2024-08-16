
@extends('layouts-website.app')
@section('content')
<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                @foreach ($Homewebsites as $Homewebsite)

                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>{{ $Homewebsite->heading }} <span clsas="d-block"></span></h1>
                            <p class="mb-4">{{ $Homewebsite->content }}</p>
                            <p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img-wrap">
                            <img src="{{ $Homewebsite->image }}" class="img-fluid" style="width: 780px;height:400px";>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    <!-- End Hero Section -->

      <!-- Start Blog Section -->
      <div class="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Categories</h2>
                </div>

            </div>

            <div class="row">
                @foreach ($categories as $category)

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="{{ url('product-details/'.$category->id) }}" class="post-thumbnail"><img src="{{ $category->image }}" alt="Image" class="img-fluid" style="height: 300px;width:350px;"></a>
                        <div class="post-content-entry">
                            <h3 style="text-align: center"><a href="">{{ $category->name }}</a></h3>
                            {{-- <div class="meta">
                                <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>


    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            @foreach ($Choosewebsites as $Choosewebsite)

            <div class="row justify-content-between">

                <div class="col-lg-6">
                    <h2 class="section-title">{{ $Choosewebsite->heading }}</h2>
                    <p>{{ $Choosewebsite->content }}</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                    {{-- <img src="{{asset('assets/images/truck.svg')}}" alt="Image" class="imf-fluid"> --}}
                                </div>
                                <h3>Fast &amp; Free Shipping</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('assets/images/bag.svg')}}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Easy to Shop</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('assets/images/support.svg')}}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>24/7 Support</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('assets/images/return.svg')}}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Hassle Free Returns</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ $Choosewebsite->image }}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
    <!-- End Why Choose Us Section -->




    <!-- Start Testimonial Slider -->
    <div class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Testimonials</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">

                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">
                            @foreach ( $testimonials as  $testimonial)

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;{{  $testimonial->content }}&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{  $testimonial->image}}" alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">{{ $testimonial->name }}</h3>
                                                <span class="position d-block mb-3">{{  $testimonial->designation }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- END item -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Slider -->


    <!-- End Blog Section -->
    @endsection
