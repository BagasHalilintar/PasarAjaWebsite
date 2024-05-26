<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\WebUser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function admin(){
        $admin = Admin::get();
        return view('profile', ['admin' => $admin]);
    }
}
