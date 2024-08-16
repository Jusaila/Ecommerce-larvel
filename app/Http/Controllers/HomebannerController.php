<?php

namespace App\Http\Controllers;

use App\Models\Excellent;
use App\Models\Homebanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomebannerController extends Controller
{
    public function index(){
        $banners = Homebanner::get();
        return view('admin-panel.home-banner')->with(compact('banners'));
    }

    public function create(){
        return view('admin-panel.add-homebanner');
    }


    public function save(Request $request){
            $rules = [
                'heading' => 'required',
                'content' => 'required',

                'image'  => 'required|mimes:jpeg,png,jpg,gif|max:2048',
                'status'  => 'required',
            ];
            $messages = [
                'heading.required' => 'heading Name is required',
                'content.required' => 'content is required',

                'image.required' => 'image is required',
                'image.mimes' => 'Only jpeg, png, jpg, gif format.',
                'image.max' => 'maximum size is 2mb',
                'status.required' => 'status is required',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect('banner/create')->withErrors($validator)->withInput();
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
            $data = Homebanner::CreateBanner($input);
            if($data == true){
                return redirect('/banner')->with('success','Banner Created Successfully');
            }else{
                return redirect('/banner')->with('error','Something went wrong');

            }
    }
    //delete
    public function delete(Request $request){
        $SelectRaw = Homebanner::find($request->id);
        $SelectRaw->delete();
        return redirect('/banner')->with('success','Home banner Deleted Succesfully');
    }

    //edit
    public function edit($id){
        $data = Homebanner::find($id);
        return view('admin-panel.edit-homebanner')->with(compact('data'));
}

public function update(Request $request){
    $rules = [
        'heading' => 'required',
        'content' => 'required',

        // 'image'  => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        'status'  => 'required',
    ];
    $messages = [
        'heading.required' => 'heading Name is required',
        'content.required' => 'content is required',

        // 'image.required' => 'image is required',
        // 'image.mimes' => 'Only jpeg, png, jpg, gif format.',
        // 'image.max' => 'maximum size is 2mb',
        'status.required' => 'status is required',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if($validator->fails()){
        return redirect('/banner/edit/'.$request->id)->withErrors($validator)->withInput();
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
    $data = Homebanner::HomeBannerUpdate($input);
    if($data == true){
        return redirect('/banner')->with('success','Banner Updated Successfully');
    }else{
        return redirect('/banner')->with('error','Something went wrong');

    }
}
}
