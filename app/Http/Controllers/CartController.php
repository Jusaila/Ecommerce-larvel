<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function cart()
    {
        $id = Auth::id();
        $carts = Cart::with('product','user')->where('user_id', $id)->get();
        return view('website.cart', ['carts' => $carts]);
    }

    public function create(Request $request, Product $product)
    {
        Log::info('Adding product to cart');

        $userId = Auth::id();

        // Check if the product already exists in the user's cart
        $cartItem = Cart::where('user_id', $userId)
                        ->where('product_id', $product->id)
                        ->first();

        if ($cartItem) {
            // If the product is already in the cart, update the quantity and total price
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->total_price = $cartItem->quantity * $product->price;
            $cartItem->save();
        } else {
            // If the product is not in the cart, create a new cart item
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1),
                'total_price' => $product->price * $request->input('quantity', 1),
                'status' => 'Pending',
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function cartCount()
    {
        $userId = Auth::id();
        $cartCount = Cart::where('user_id', $userId)->count();
        return $cartCount; // Return the count directly as a plain number
    }
    //cart-total

    public function cartTotal()
    {
        $id = Auth::id();
        $carts = Cart::where('user_id', $id)->get();
        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->total_price ;
        }

        return response()->json(['total' => $total]);
    }

    // Delete a cart item
    public function cartDelete(Request $request)
    {
        $selectRaw = Cart::find($request->id);
        $selectRaw->delete();
        return redirect('/cart')->with('success','Product Removed From Cart');
    }

    public function updateQuantity(Request $request)
    {
        $cart = Cart::find($request->id);

        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->total_price = $cart->product->price * $request->quantity;
            $cart->save();

            return response()->json(['success' => true, 'message' => 'Quantity updated successfully', 'total_price' => $cart->total_price]);
        }

        return response()->json(['success' => false, 'message' => 'Cart item not found']);
    }
}
