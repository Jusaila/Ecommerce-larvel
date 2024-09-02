@extends('layouts-website.app')
@section('content')


	<!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
<!-- End Hero Section -->



<div class="untree_co-section before-footer-section">

    <div class="container">
        @if (session('success'))
        <span class="alert alert-success">
            {{ session('success') }}
        </span>
       @endif
      <div class="row mb-5">
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($carts as $cart)

                <tr>
                  <td class="product-thumbnail">
                    <img src="{{ $cart->product->image }}" alt="Image" class="img-fluid">
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black">{{ $cart->product->name }}</h2>
                  </td>
                  <td>{{ $cart->product->price}}</td>
                  <td>
                    <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                      <div class="input-group-prepend">
                        <button class="btn btn-outline-black decrease" type="button" data-id="{{ $cart->id }}">&minus;</button>
                      </div>
                      <input type="text" class="form-control text-center quantity-amount" value="{{ $cart->quantity }}" data-id="{{ $cart->id }}" aria-label="Example text with button addon">
                      <div class="input-group-append">
                        <button class="btn btn-outline-black increase" type="button" data-id="{{ $cart->id }}">&plus;</button>
                      </div>
                    </div>
                  </td>
                  <td class="product-total" data-id="{{ $cart->id }}">{{ $cart->total_price }}</td>

                  <td>
                    <form method="POST" action="{{ route('cart.delete') }}" onsubmit="return confirm('Do you want to delete?')" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cart->id }}">
                        <button class="btn btn-danger" type="submit">X</button>
                    </form>
                  </td>

                </tr>

                @endforeach

              </tbody>
            </table>
          </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">

            <div class="col-md-6">
              <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
            </div>
          </div>

        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              {{-- <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black ">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black"></strong>
                </div>
              </div> --}}
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black cart-total"></strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <a class="btn btn-black btn-lg py-3 btn-block" href="{{ route('checkout')}}">Proceed To Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        updateCartTotal();

        // Handle quantity increase button
        $('.increase').click(function () {
            let id = $(this).data('id');
            let inputField = $(`input[data-id="${id}"]`);
            let newQuantity = parseInt(inputField.val());

            updateQuantity(id, newQuantity);
        });

        // Handle quantity decrease button
        $('.decrease').click(function () {
            let id = $(this).data('id');
            let inputField = $(`input[data-id="${id}"]`);
            let newQuantity = parseInt(inputField.val());

            if (newQuantity > 0) {  // Prevent quantity from being zero or negative
                updateQuantity(id, newQuantity);
            }
        });

        // AJAX request to update quantity
        function updateQuantity(id, quantity) {
            $.ajax({
                url: "{{ route('cart.updateQuantity') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    quantity: quantity
                },
                success: function (response) {
                    if (response.success) {
                        let inputField = $(`input[data-id="${id}"]`);
                        inputField.val(quantity);

                        $(`td.product-total[data-id="${id}"]`).text(response.total_price);


                        updateCartTotal();

                    } else {
                        alert(response.message);
                    }
                }
            });
        }
        function updateCartTotal() {
        $.ajax({
            url: "{{ route('cart.total') }}",
            method: "GET",
            success: function(response){
                console.log('Cart Total is:', response.total);
                $('.cart-total').text(response.total);  // Update the total value
            },
            error: function(xhr, status, error){
                console.error('Error:', error);
            }
        });
}


        // Function to update cart subtotal and total dynamically
    //     function updateCartTotals() {
    //         let subtotal = 50;

    //         $('.product-total').each(function () {
    //             subtotal += parseFloat($(this).text());
    //         });

    //         $('.cart-subtotal').text(subtotal.toFixed(2));
    //         $('.cart-total').text(subtotal.toFixed(2)); // Assuming subtotal is the same as total here
    //     }
    });


</script>
