<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;
use Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validateRequest($request, $id);
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>$validator->errors()]);
        }else{
            $tmpImg = public_path().'/uploads/tmp/'.$request->hdnFileName;
            $dest = public_path().'/uploads/images/'.$request->hdnFileName;
            if(file_exists($tmpImg)){
                rename($tmpImg, $dest);
            }
            $user = User::find($id);

            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->profile_pic = $request->hdnFileName;
            $user->save();
            return response()->json(["success"=>true, "msg"=>"User was successfully updated!", "data"=>$request->all()]);
        }
    }

    public function show(){
        
    }
    public function checkPassword(Request $request)
    {
        $user = User::whereId(Auth::user()->id)->first();
        $oldPassword = $request->oldPassword;
        $userPassword= $user->password;
        if(Hash::check($oldPassword, $userPassword)){
            return response()->json(["success"=>true, "msg"=>"", "data"=>true]);
        }else{
            return response()->json(["success"=>false, "error"=>"Invalid Old Password. Please try again.", "data"=>false]);
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->newPassword);
        $user->save();
        return response()->json(["success"=>true, "msg"=>"Password was successfully updated!", "data"=>""]);
    }

    public function validateRequest($request, $id){
        return Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
    }

    public function getProfileSettings(){
        return view('admin.pages.profile-settings');
    }
}
