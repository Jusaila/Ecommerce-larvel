<?php

namespace App\Http\Controllers;

use App\Models\Testomonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testomonial::get();
        return view('admin-panel.testimonial')->with(compact('testimonials'));
    }
    public function create(){
        // dd(1);
        return view('admin-panel.add-testimonial');
    }
    public function save(Request $request){
        $rules = [
            'heading' => 'required',
            'content' => 'required',
            'image'  => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'designation' => 'required',

            'status'  => 'required',
        ];
        $messages = [
            'heading.required' => 'heading Name is required',
            'content.required' => 'content is required',

            'image.required' => 'image is required',
            'image.mimes' => 'Only jpeg, png, jpg, gif format.',
            'image.max' => 'maximum size is 2mb',
            'name.required' => 'name is required',
            'designation.required' => 'designation is required',

            'status.required' => 'status is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('testimonials/create')->withErrors($validator)->withInput();
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
        $data = Testomonial::CreateTestimonial($input);
        if($data == true){
            return redirect('/testimonials')->with('success','testimonials Updated Successfully');
        }else{
            return redirect('/testimonials')->with('error','Something went wrong');

        }
}

        public function delete(Request $request){
            $SelectRaw = Testomonial::find($request->id);
            $SelectRaw->delete();
            return redirect('/testimonials')->with('success',' testimonials Deleted Succesfully');
        }

        //edit
//         public function edit($id){
//             $data = Testomonial::find($id);
//             return view('admin-panel.edit-testimonial')->with(compact('data'));
//         }

//         public function update(Request $request){
//         $rules = [
//             'heading' => 'required',
//             'content' => 'required',

//             // 'image'  => 'required|mimes:jpeg,png,jpg,gif|max:2048',
//             'status'  => 'required',
//         ];
//         $messages = [
//             'heading.required' => 'heading Name is required',
//             'content.required' => 'content is required',

//             // 'image.required' => 'image is required',
//             // 'image.mimes' => 'Only jpeg, png, jpg, gif format.',
//             // 'image.max' => 'maximum size is 2mb',
//             'status.required' => 'status is required',
//         ];

//         $validator = Validator::make($request->all(), $rules, $messages);

//         if($validator->fails()){
//             return redirect('/banner/edit/'.$request->id)->withErrors($validator)->withInput();
//         }
//         $input = $request->all();

//         $input['image_path'] = $request->currentImage;

//         if($request->hasFile('image')){
//             $fileName = $request->image->getClientOriginalName();
//             $fileName_withoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
//             $new_FileName = $fileName_withoutExtension . time() . "." . $request->image->getClientOriginalExtension();

//             $move = $request->image->move(public_path('assets/uploads/images'), $new_FileName);
//             $image = url("assets/uploads/images/{$new_FileName}");

//             $input['image_path'] = $image;
//         }
//         $data = Homebanner::HomeBannerUpdate($input);
//         if($data == true){
//             return redirect('/banner')->with('success','Banner Updated Successfully');
//         }else{
//             return redirect('/banner')->with('error','Something went wrong');

//         }
// }


}
