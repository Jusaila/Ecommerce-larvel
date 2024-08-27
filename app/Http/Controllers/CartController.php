<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function cart(){
        $id = Auth::id();
        $carts = Cart::where('user_id',$id)->get();
        return view('website.cart',['carts' => $carts]);

    }

    public function create(Request $request, Product $product){
        Log::info('the');
        // Add product to the cart logic
        $cart = Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->input('quantity', 1),
            'total_price' => $product->price * $request->input('quantity', 1),
            'status' => 'Pending',
        ]);

        return response()->json(['success' => true]);

    }

    public function cartCount()
    {
        $userId = Auth::id();
        $cartCount = Cart::where('user_id', $userId)->count();
        return $cartCount; // Return the count directly as a plain number
    }

    //delete
    public function cartDelete(Request $request){
        $SelectRaw = Cart::find($request->id);
        $SelectRaw->delete();
        dd($SelectRaw);
    }

}
