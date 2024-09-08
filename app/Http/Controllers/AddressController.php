<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{


    public function index(){
        $address = Address::get();
        return view('address.index',['address' => $address]);
    }

    public function create(){
        return view('address.create');
    }

    public function store(Request $request){


        $request->validate([
            'country' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'housename' => 'required',
            'address' => 'required',
            'state' => 'required',
            'pincode' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);
        $input = $request->all();
        $data = Address::CreateAddress($input);
        if($data == true){
            return redirect(route('address'))->with('success','User Created Successfully');
        }else{
            return redirect(route('address'))->with('error','Something Went Wrong');

        }
    }

}
