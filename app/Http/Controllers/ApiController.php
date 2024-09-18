<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\json;

class ApiController extends Controller
{
    public function allUsers(){
        $getUser = User::get();
        return response()->json($getUser);
    }

    public function categories(){

        $categories = Category::get();

        return response()->json($categories);

    }

    public function userdetails($id){
        $userDetails = User::where('id',$id)->first();

        return response()->json($userDetails);
    }

    public function products(){
    $getProducts = Product::get();
        return response()->json($getProducts);
    }

    public function carttotal($userId){

        $carts = Cart::with('product','user')->where('user_id', $userId)->get();
        $totalPrice = $carts->sum(function($cart) {
            return $cart->product->price * $cart->quantity;
        });
        return response()->json($totalPrice);
    }

    public function categoryProduct($id){
        $products = Product::where('category_id',$id)->get();
        return response()->json($products);
    }

    public function productDetails($id){
        $products = Product::where('id',$id)->first();
        return response()->json($products);

    }

    public function register(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    // Create a new user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);


    return response()->json([
        'message' => 'User registered successfully!',
        'user' => $user,
    ]);


    }

}
