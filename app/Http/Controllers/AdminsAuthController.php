<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsAuthController extends Controller
{
    // login
    public function Login(){
        return view('admins.auth.login');
    }
}
