<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ThemeController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function saveTheme(Request $request){
		$user = User::find(Auth::user()->id);
        $user->theme = $request->theme;
        $user->save();
    	return response()->json(["success"=>true, "msg"=>"The selected Theme has been saved successfully!", "data"=>$request->theme]);
    }
}
