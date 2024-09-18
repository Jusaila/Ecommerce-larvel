<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function checkOut(){
        $address = Address::where('status',1)->get();
        $id = Auth::id();
        $carts = Cart::with('product','user')->where('user_id', $id)->get();
        $totalPrice = $carts->sum(function($cart) {
            return $cart->product->price * $cart->quantity;
        });
        return view('website.checkout',['address' => $address ,'carts' => $carts, 'totalPrice' => $totalPrice]);
    }
}
