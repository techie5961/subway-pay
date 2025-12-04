<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersAuthController extends Controller
{
    // login
    public function Login(){
     return view('users.auth.login');
     
    }
      // register
    public function Register(){
      $ref='';
      if(request()->has('ref')){
        if(DB::table('users')->where('uniqid',request()->input('ref'))->count() > 0){
          $ref=request()->input('ref');
        }
      }
     return view('users.auth.register',[
      'ref' => $ref
     ]);
     
    }
}
