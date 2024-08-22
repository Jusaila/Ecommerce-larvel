<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContentType;
use App\Models\Excellent;
use App\Models\ExcellentProduct;
use App\Models\Homebanner;
use App\Models\Product;
use App\Models\Testomonial;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class HomepageController extends Controller
{
    public function home(){

        $categories = Category::get();
        // $banners = Homebanner::where('status','Active')->first();
        $excellents = Excellent::where('status','Active')->first();
        $excellentProductIds = ExcellentProduct::where('status','Active')->pluck('product_id')->toArray();
        // $excellent_products = ExcellentProduct::JOIN('products','products.id','excellent_products.product_id')->SELECT('products.*','') get();
        $excellentProducts = Product::whereIn('id',$excellentProductIds)->get();

        $testimonials = Testomonial::where('status','Active')->get();
        $Homewebsites = WebsiteContent::where('content_id',1)->get();
        $Choosewebsites = WebsiteContent::where('content_id',2)->get();



        return view('website.home')->with(compact('Homewebsites','Choosewebsites','excellents','excellentProducts','testimonials','categories'));
    }

    public function api(){

        $categories = Category::get();

        return response()->json($categories);

    }

}
