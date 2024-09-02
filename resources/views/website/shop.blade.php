@extends('layouts-website.app')
@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
          <div class="row">
            @foreach ($products as $product)

            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                    <img src="{{ $product->image }}" class="img-fluid product-thumbnail"  style="height: 300px;width:250px;">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <strong class="product-price">{{ $product->price }}</strong>

                    <span class="icon-cross" data-product-id = {{ $product->id }}>
                        <img src="{{asset('assets/images/cross.svg')}}" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 1 -->
            @endforeach
          </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Attach click event listener to the cross icon
        document.querySelectorAll('.icon-cross').forEach(function(crossIcon) {
            crossIcon.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = this.getAttribute('data-product-id');
                addToCart(productId);
            });
        });

        // Function to add product to cart
        function addToCart(id) {
            $.ajax({
                url: '/cart/create/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    quantity: 1 // Default quantity to 1
                },
                success: function(response) {
                    if (response.success) {
                        alert('Product added to cart successfully!');
                        updateCartCount(); // Call function to update cart count in the header
                    } else {
                        alert('Failed to add product to cart.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred while adding the product to the cart.');
                }
            });
        }
    });
</script>


@endsection
