@extends('layouts-website.app')
@section('content')

<div class="untree_co-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Billing Address</h2>
            <div class="p-3 p-lg-5 border bg-white">
                <table style="width: 100%; border-collapse: collapse;">
                    <tbody>
                        @foreach($address as $addres)
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">First Name</td>
                                <td style="padding: 10px;">{{ $addres->first_name }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">Last Name</td>
                                <td style="padding: 10px;">{{ $addres->last_name }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">Country</td>
                                <td style="padding: 10px;">{{ $addres->country }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">House Name</td>
                                <td style="padding: 10px;">{{ $addres->house_name }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">Address</td>
                                <td style="padding: 10px;">{{ $addres->address }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">State</td>
                                <td style="padding: 10px;">{{ $addres->state }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">Pincode</td>
                                <td style="padding: 10px;">{{ $addres->pincode }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">E-mail</td>
                                <td style="padding: 10px;">{{ $addres->email }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px; font-weight: bold;">Phone</td>
                                <td style="padding: 10px;">{{ $addres->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <br>
                <div class="form-group">
                  <button class="btn btn-black py-3 btn-block" onclick="window.location='{{ route('address.create') }}'">Add Another Address</button>
                </div>

              </div>
        </div>
      </div>
      <div class="row">

        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border bg-white">
                    <table class="table site-block-order-table mb-5">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->product->name }}<strong class="mx-2">x</strong>{{ $cart->quantity }}</td>
                                    <td>{{ $cart->total_price }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="1" class="text-black font-weight-bold" style="text-align: left;"><strong>Order Total</strong></td>
                                <td class="text-black font-weight-bold"><strong>Rs {{ $totalPrice }}</strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form-group">
                        <a class="btn btn-black btn-lg py-3 btn-block" href="{{ route('razorpay')}}">Place Order</a>
                    </div>
                </div>
            </div>
        </div>


        </div>
      </div>
      <!-- </form> -->
    </div>
  </div>
@endsection
