<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    

    public function getOnePage(){
    	return view('one-pages.home');
    }
}
