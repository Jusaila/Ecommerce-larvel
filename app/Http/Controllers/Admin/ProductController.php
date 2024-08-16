<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::JOIN('categories','products.category_id','categories.id')->select('products.*','categories.name as categoryName')->get();
        return view('admin-panel.products')->with(compact('products'));


    }
    public function shop(){
        $products = Product::where('status','Active')->get();

        return view('website.shop')->with(compact('products'));


    }
    public function create(){
        $categories =Category::get();
        return view('admin-panel.add-products')->with(compact('categories'));
    }

    public function save(Request $request){
        $rules = [
            'productName' => 'required',
            'description' => 'required',
            'categoryId'  => 'required',
            'price'  => 'required|numeric',
            'image'  => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'size'  => 'required',
            'visible_at' => 'required',
            'status'  => 'required',
        ];
        $messages = [
            'productName.required' => 'Product Name is required',
            'description.required' => 'description is required',
            'categoryId.required' => 'category is required',
            'price.required' => 'price is required',
            'image.required' => 'image is required',
            'image.mimes' => 'Only jpeg, png, jpg, gif format.',
            'image.max' => 'maximum size is 2mb',
            'size.required' => 'size is required',
            'visible_at.required' => 'visible_at is required',

            'status.required' => 'status is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('/add-products')->withErrors($validator)->withInput();
        }
        $input = $request->all();

        $input['image_path'] = "";

        if($request->hasFile('image')){
            $fileName = $request->image->getClientOriginalName();
            $fileName_withoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
            $new_FileName = $fileName_withoutExtension . time() . "." . $request->image->getClientOriginalExtension();

            $move = $request->image->move(public_path('assets/uploads/images'), $new_FileName);
            $image = url("assets/uploads/images/{$new_FileName}");

            $input['image_path'] = $image;
        }

        $data = Product::CreateProduct($input);
        if($data['response']){
            return redirect('products')->with('success',$data['message']);
        }else{
            return redirect('products')->with('error',$data['message']);

        }

    }

     //delete
     public function delete(Request $request){
        $selectRaw = Product::find($request->id);
        $selectRaw->delete();
        return redirect('products')
        ->with('success', 'Employee details Deleted successfully.');
    }
//edit
    public function edit($id){
        $data = Product::find($id);
        $categories = Category::get();
        return view('admin-panel.edit-product')->with(compact('data','categories'));
    }

    //update
    public function update(Request $request){
        $rules = [
            'productName' => 'required',
            'description' => 'required',
            'categoryId'  => 'required',
            'price'  => 'required|numeric',
            // 'image'  => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'size'  => 'required',
            'visible_at' => 'required',

            'status'  => 'required',
        ];
        $messages = [
            'productName.required' => 'Product Name is required',
            'description.required' => 'description is required',
            'categoryId.required' => 'category is required',
            'price.required' => 'price is required',
            // 'image.required' => 'image is required',
            // 'image.mimes' => 'Only jpeg, png, jpg, gif format.',
            // 'image.max' => 'maximum size is 2mb',
            'size.required' => 'size is required',
            'visible_at.required' => 'visible_at is required',

            'status.required' => 'status is required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('edit-products/'.$request->id)->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $input['image_path'] = $request->currentImage;

        if($request->hasFile('image')){
            $fileName = $request->image->getClientOriginalName();
            $fileName_withoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
            $new_FileName = $fileName_withoutExtension . time() . "." . $request->image->getClientOriginalExtension();

            $move = $request->image->move(public_path('assets/uploads/images'), $new_FileName);
            $image = url("assets/uploads/images/{$new_FileName}");

            $input['image_path'] = $image;
        }
        $data = Product::ProductUpdate($input);


        if ($data == true) {
            return redirect('/products')
                ->with('success', 'Product details Updated successfully.');
        } else {
            return redirect('/products')
                ->with('error', 'Something went wrong.');
        }

}
}
