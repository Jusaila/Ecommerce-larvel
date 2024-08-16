@extends('layouts-website.app')
@section('content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            @if (count($products))
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-12 col-md-4 col-lg-3 mb-5">
                            <a class="product-item" href="#">
                                <img src="{{ $product->image }}" class="img-fluid product-thumbnail" style="height: 300px;width:250px;">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <strong class="product-price">{{ $product->price }}</strong>

                                <span class="icon-cross">
                                    <img src="{{ asset('assets/images/cross.svg') }}" class="img-fluid">
                                </span>
                            </a>
                        </div>
                        <!-- End Column 1 -->
                    @endforeach
                </div>
            @else
            <h3 class="product-title">No Items Available.</h3>

            @endif

        </div>
    </div>
@endsection
