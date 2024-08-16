<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $products = Product::JOIN('categories','products.category_id','categories.id')->select('products.*','categories.name as categoryName')->get();
        return view('website.blog')->with(compact('products'));
    }
}
