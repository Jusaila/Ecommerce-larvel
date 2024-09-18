<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request){
        $amount = $request->input('amount'); 
        return view('payment.index', compact('amount'));
    }

    public function store(Request $request){

    }
}
