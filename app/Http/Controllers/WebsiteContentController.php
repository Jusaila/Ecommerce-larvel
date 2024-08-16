<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteContentController extends Controller
{
    public function index(){
        $websites = WebsiteContent::get();
        return view('admin-panel.website')->with(compact('websites'));
    }
    public function create(){
        $contents = ContentType::get();
        return view('admin-panel.add-website')->with(compact('contents'));
    }

    public function save(Request $request){
        $rules = [
            'content_id' => 'required',
            'heading' => 'required',
            'content' => 'required',

            'image'  => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'status'  => 'required',
        ];
        $messages = [
            'content_id.required' => 'Content Type is required',
            'heading.required' => 'heading Name is required',
            'content.required' => 'content is required',

            'image.required' => 'image is required',
            'image.mimes' => 'Only jpeg, png, jpg, gif format.',
            'image.max' => 'maximum size is 2mb',
            'status.required' => 'status is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('website/create')->withErrors($validator)->withInput();
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
        $data = WebsiteContent::CreateWebsite($input);
        if($data == true){
            return redirect('/website')->with('success','Website Content Created Successfully');
        }else{
            return redirect('/website')->with('error','Something went wrong');

        }
}
}
