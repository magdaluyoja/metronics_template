<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Hash;
class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function getProfileOverview()
    {
        return view('admin.pages.profile');
    }

    public function getProfileSettings(){
        return view('admin.pages.profile-settings');
    }
    public function updateProfilePic(Request $request){
    	$files =  $request->file('tmp_attachments');
    	if(!is_null($files)){
                    
	    	$validator = Validator::make(
                $request->all(), [
                'tmp_attachments' => 'mimes:jpg,jpeg,png,gif|max:2000'
                ],[
                    'tmp_attachments.mimes' => 'Invalid file, please select JPG or PNG image files.',
                    'tmp_attachments.max' => 'File size exceeds maximum file size of 2MB.',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->messages();
                foreach ($messages->messages() as $key => $value) {
                    foreach ($value as $errMsg) {
                        $validator->errors()->add($key, "$errMsg");
                    }
                }
                return response()->json(["success"=>false, "error"=>$validator->errors()]);
                exit();
            }else{
                $filename = $files->getClientOriginalName();
                $files->move('uploads/images/', $filename);

                $user = User::find(Auth::user()->id);

	            $user->profile_pic = $filename;
	            $user->save();

                return response()->json(["success"=>true, "msg"=>"Profile picture successfully updated!", "data"=>["filename"=>$filename]]);
            }
		    	
	    }else{
	    	return response()->json(["success"=>false, "error"=>"Upload failed. Contact the developers."]);
	    }
    }
    public function updateProfile(Request $request, $id){
        // var_dump($request->all()); exit();
        $validator = $this->validateRequest($request, Auth::user()->id);
        if ($validator->fails()) {
            return response()->json(['success'=>false, 'error'=>$validator->errors()]);
        }else{
            $user = User::find(Auth::user()->id);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->save();
            return response()->json(["success"=>true, "msg"=>"User was successfully updated!", "data"=>$request->all()]);
        }
    }
    public function validateRequest($request, $id){
        return Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
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
}
