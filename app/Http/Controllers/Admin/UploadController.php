<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Auth;

class UploadController extends Controller
{
    public function uploadTmp(Request $request){

        $files =  $request->file('tmp_attachments');

    	if(!is_null($files)){
                    
            if($request->upload_type === "image"){
    	    	$validator = Validator::make(
                    $request->all(), [
                    'tmp_attachments.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
                    ],[
                        'tmp_attachments.*.mimes' => 'Invalid file, please select JPG or PNG image files.',
                        'tmp_attachments.*.max' => 'File size exceeds maximum file size of 2MB.',
                    ]
                );
            }elseif ($request->upload_type === "docs") {
                $validator = Validator::make(
                    $request->all(), [
                    'tmp_attachments.*' => 'mimes:pdf,doc,ppt|max:10000'
                    ],[
                        'tmp_attachments.*.mimes' => 'Invalid file, please select JPG or PNG image files.',
                        'tmp_attachments.*.max' => 'File size exceeds maximum file size of 10MB.',
                    ]
                );
            }
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
                $filenames = array();
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $file->move('uploads/tmp/', $filename);
                    array_push($filenames,$filename);
                }
		    	return response()->json(["success"=>true, "msg"=>"", "data"=>["filename"=>$filenames, "upload_type"=>$request->upload_type]]);
		    }
	    }else{
	    	return response()->json(["success"=>false, "error"=>"Upload failed. Contact the developers."]);
	    }
    }
}
