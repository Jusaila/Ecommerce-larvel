<?php

namespace App\Http\Controllers;

use App\Models\Whychooseus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhyChooseUsController extends Controller
{
    public function index(){
        $chooseuses = Whychooseus::get();
        return view('admin-panel.chooseus')->with(compact('chooseuses'));
    }
    public function create(){
        return view('admin-panel.add-chooseus');
    }
    public function save(Request $request){
        $rules = [

            'icon' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'sub-heading' => 'required',
            'sub-content' => 'required',
            'status'  => 'required',
        ];
        $messages = [

            'icon.required' => 'icon is required',
            'icon.mimes' => 'Only jpeg, png, jpg, gif format.',
            'icon.max' => 'maximum size is 2mb',
            'sub-heading.required' => 'sub-heading is required',
            'sub-content.required' => ' sub-content  is required',

            'status.required' => 'status is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('chooseus/create')->withErrors($validator)->withInput();
        }
        $input = $request->all();



        $input['icon_path'] = "";

        if($request->hasFile('icon')){
            $fileName = $request->icon->getClientOriginalName();
            $fileName_withoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
            $new_FileName = $fileName_withoutExtension . time() . "." . $request->icon->getClientOriginalExtension();

            $move = $request->icon->move(public_path('assets/uploads/icons'), $new_FileName);
            $icon = url("assets/uploads/icons/{$new_FileName}");

            $input['icon_path'] = $icon;
        }
        $data = Whychooseus::CreateChooseUs($input);
            if($data == true){
                return redirect('/chooseus')->with('success','Choose Us Created Successfully');
            }else{
                return redirect('/chooseus')->with('error','Something went wrong');

            }
    }
    //delete

    public function delete(Request $request){
        $SelectRaw = Whychooseus::find($request->id);
        $SelectRaw->delete();
        return redirect('/chooseus')->with('success',' Choose Us Deleted Succesfully');
    }
}
