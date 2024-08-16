<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentTypeController extends Controller
{
    public function index(){
        $contents = ContentType::get();
        return view('admin-panel.content')->with(compact('contents'));
    }
    public function create(){
        return view('admin-panel.add-content');
    }
    public function save(Request $request){
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'category type is required'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('content/create')->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $data = ContentType::CreateContent($input);
        if($data == true){
            return redirect('/content')->with('success','Content Type Created Successfully');
        }else{
            return redirect('/content')->with('error','Something wnt Wrong');

        }
    }

}
