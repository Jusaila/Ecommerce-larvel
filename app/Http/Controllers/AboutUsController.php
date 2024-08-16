<?php

namespace App\Http\Controllers;

use App\Models\Testomonial;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public  function about(){
        $Homewebsites = WebsiteContent::where('content_id',1)->get();
        $Choosewebsites = WebsiteContent::where('content_id',2)->get();
        $testimonials = Testomonial::where('status','Active')->get();

        return view('website.about')->with(compact('Homewebsites','Choosewebsites','testimonials'));
    }
}
