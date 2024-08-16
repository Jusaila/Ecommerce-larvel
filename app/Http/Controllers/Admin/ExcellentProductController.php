<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExcellentProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExcellentProductController extends Controller
{
    public function index(){
        $products = ExcellentProduct::JOIN('products','excellent_products.product_id','products.id')->SELECT('excellent_products.product_id','excellent_products.id','excellent_products.status as ExcellentStatus','products.*','excellent_products.*')->get();
        return view('admin-panel.excellent-product')->with(compact('products'));
    }
    public function create(){
        $products = Product::get();
        return view('admin-panel.add-excellent-product')->with(compact('products'));
    }
    public function save(Request $request){
        $rules = [
            'productId' => 'required',
            'status' => 'required'
        ];
        $messages = [
            'productId.required' => 'Product Id is required',
            'status.required' => 'Status is required'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/excellent-product/create')->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $data = ExcellentProduct::CreateExcellentProduct($input);
        if($data['response'] == true){
            return redirect('/excellent-product')->with('success','ExcellentProduct added successfully');
        }else{
            return redirect('/excellent-product')->with('error',$data['message']);

        }
    }
    //delete
    public function delete(Request $request){
        $selectRaw = ExcellentProduct::find($request->id);
        $selectRaw->delete();
        return redirect('/excellent-product')->with('success','ExcellentProduct deleted successfully');
    }
    //edit
    public function edit($id){
        $data = ExcellentProduct::find($id);
        $products = Product::get();
        return view('admin-panel.edit-excellentproduct')->with(compact('data','products'));
    }

    //update
    public function update(Request $request){
        $rules = [
            'productId' => 'required',
            'status' => 'required'
        ];
        $messages = [
            'productId.required' => 'Product Id is required',
            'status.required' => 'Status is required'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/excellent-product/edit/'.$request->id)->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $data = ExcellentProduct::UpdateExcellentProduct($input);
        if($data['response'] == true){
            return redirect('/excellent-product')->with('success','ExcellentProduct edited successfully');
        }else{
            return redirect('/excellent-product')->with('error',$data['message']);

        }
    }
}
