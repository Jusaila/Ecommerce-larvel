@extends('layouts-website.app')
@section('content')

<div class="untree_co-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">

        </div>
      </div>
      <div class="row">

          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Your Order</h2>
              <div class="p-3 p-lg-5 border bg-white">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Product</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Top Up T-Shirt <strong class="mx-2">x</strong> 1</td>
                      <td>$250.00</td>
                    </tr>
                    <tr>
                      <td>Polo Shirt <strong class="mx-2">x</strong>   1</td>
                      <td>$100.00</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                      <td class="text-black">$350.00</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                      <td class="text-black font-weight-bold"><strong>$350.00</strong></td>
                    </tr>
                  </tbody>
                </table>


                <div class="form-group">
                  <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='thankyou.html'">Place Order</button>
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
