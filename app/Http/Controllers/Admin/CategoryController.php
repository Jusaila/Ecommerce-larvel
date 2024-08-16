<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('admin-panel.categories')->with(compact('categories'));
    }
    public function create(){
        return view('admin-panel.add-categories');
    }
    public function productDetails($id){
        $products = Product::where('category_id',$id)->get();
        return view('website.product-details')->with(compact('products'));
    }

    public function save(Request $request){
        $rules = [
            'categoryName' => 'required',
            'status' => 'required',
            'image'  => 'required|mimes:jpeg,png,jpg,gif|max:2048',

        ];
        $messages = [
            'categoryName.required' => 'category name is required',
            'image.required' => 'image is required',
            'image.mimes' => 'Only jpeg, png, jpg, gif format.',
            'image.max' => 'maximum size is 2mb',
            'status.required' => 'status is required'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/add-categories')->withErrors($validator)->withInput();
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

        $data = Category::createCategory($input);
        if($data['response'] == true){
            return redirect('categories')->with('success',$data['message']);
        }else{
            return redirect('categories')->with('error',$data['message']);

        }
    }

    //delete
    public function delete(Request $request){
        $selectRaw = Category::find($request->id);
        $selectRaw->delete();
        return redirect('categories')->with('success','category deleted successfully');
    }
    //edit
    public function edit($id){
        $data = Category::find($id);
        return view('admin-panel.edit-category')->with(compact('data'));
    }
    //update
    public function update(Request $request){
        $rules = [
            'categoryName' => 'required',
            'status' => 'required'
        ];
        $messages = [
            'categoryName.required' => 'category name is required',
            'status.required' => 'status is required'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('edit-categories/'.$request->id)->withErrors($validator)->withInput();
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


        $data = Category::UpdateCategory($input);
        if($data == true){
            return redirect('categories')->with('success','Category Updated Successfully');
        }else{
            return redirect('categories')->with('error','Something went wrong');

        }
    }
    }

