<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Site extends Controller
{
    //
    public function indexPage(){
        return view('front.home');
        }
}
