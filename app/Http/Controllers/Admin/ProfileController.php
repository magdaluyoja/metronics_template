<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getProfileOverview()
    {
        return view('admin.pages.profile');
    }

    public function getProfileSettings(){
        return view('admin.pages.profile-settings');
    }
}
