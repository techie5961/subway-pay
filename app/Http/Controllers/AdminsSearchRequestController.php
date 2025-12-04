<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsSearchRequestController extends Controller
{
    // transactions
    public function Transactions(){
        $trx=DB::table('transactions')->join('users','users.id','transactions.user_id')->where('users.username','like','%'.request()->input('q').'%')->orWhere('users.name','like','%'.request()->input('q').'%')->orWhere('users.email','like','%'.request()->input('q').'%')->select('users.username','transactions.*')->limit(5)->get();
        return view('components.sections',[
            'search_trx' => true,
            'trx' => $trx
        ]);
    }
    // search transactions
    public function FinanceTransactions(){
        $q=request()->input('q');
       if(request()->input('status') == 'all'){
         $trx=DB::table('transactions')->join('users','transactions.user_id','users.id')->where('transactions.type',request()->input('type'))->where(function($query) use($q){
            $query->where('users.name','like','%'.$q.'%')->orWhere('users.email','like','%'.$q.'%')->orWhere('users.username','like','%'.$q.'%');

        })->select('users.username','transactions.*')->limit(5)->get();
       }else{
         $trx=DB::table('transactions')->join('users','transactions.user_id','users.id')->where('transactions.type',request()->input('type'))->where('transactions.status',request()->input('status'))->where(function($query) use($q){
            $query->where('users.name','like','%'.$q.'%')->orWhere('users.email','like','%'.$q.'%')->orWhere('users.username','like','%'.$q.'%');

        })->select('users.username','transactions.*')->limit(5)->get();
       }
       $trx->transform(function($each){
           $each->url = url('admins/'.$each->type.'s/'.request()->input('status').'?user_id='.$each->user_id.'');
           return $each;
       });
          return view('components.sections',[
            'search_trx' => true,
            'trx' => $trx,
         
        ]);
    }
    // users
    public function SearchUsers($status){
       if($status == 'all'){
        $users=DB::table('users')->where('name','like','%'.request()->input('q').'%')->orWhere('email','like','%'.request()->input('q').'%')->orWhere('username','like','%'.request()->input('q').'%')->limit(5)->get();
        
       }else{
         $users=DB::table('users')->where('status',$status)->where(function($q){
           $q->where('name','like','%'.request()->input('q').'%')->orWhere('email','like','%'.request()->input('q').'%')->orWhere('username','like','%'.request()->input('q').'%');
         })->limit(5)->get();
     
       }

       $users->transform(function($each) use($status){
        $each->url=url('admins/users/'.$status.'?user_id='.$each->id.'');
        return $each;
       });
       return view('components.sections',[
        'users' => $users,
        'search_users' => true
       ]);
    }
     // users
    public function SearchPromoters(){
      $query=request()->input('q');
        $users=DB::table('users')->where('type','promoter')->where(function($q) use($query){
            $q->where('name','like','%'.$query.'%')->orWhere('email','like','%'.$query.'%')->orWhere('username','like','%'.$query.'%');
        })->limit(5)->get();
        
     

       $users->transform(function($each){
        $each->url=url('admins/promoters?user_id='.$each->id.'');
        return $each;
       });
       return view('components.sections',[
        'promoters' => $users,
        'search_promoters' => true
       ]);
    }

}
