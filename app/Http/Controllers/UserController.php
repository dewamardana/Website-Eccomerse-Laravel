<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $data = array('title' => 'User Profil');
        return view('dashboard.user.index', $data);
    }

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('dashboard.user.setting', $data);
    }
}
