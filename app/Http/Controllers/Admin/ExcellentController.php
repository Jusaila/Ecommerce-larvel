<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Excellent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExcellentController extends Controller
{
    public function index(){
        $excellents = Excellent::get();

        return view('admin-panel.excellent')->with(compact('excellents'));
    }
    public function create(){
        return view('admin-panel.add-excellent');
    }
    public function save(Request $request){
        $rules = [
            'heading' => 'required',
            'content' => 'required',

            'status'  => 'required',
        ];
        $messages = [
            'heading.required' => 'heading Name is required',
            'content.required' => 'content is required',


            'status.required' => 'status is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect('excellent/create')->withErrors($validator)->withInput();
        }
        $input = $request->all();


        $data = Excellent::CreateExcellent($input);
        if($data == true){
            return redirect('/excellent')->with('success','Excellent material Created Successfully');
        }else{
            return redirect('/excellent')->with('error','Something went wrong');

        }

}
    public function delete(Request $request){
        $selectRaw = Excellent::find($request->id);
        $selectRaw->delete();
        return redirect('/excellent')->with('success','ExcellentProduct deleted successfully');
    }
}
