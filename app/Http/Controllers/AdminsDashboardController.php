<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminsDashboardController extends Controller
{
    // dashboard
    public function Dashboard(){
        $users=DB::table('users')->count();
        $today_users=DB::table('users')->whereDate('date',Carbon::today())->count();
        $yesterday_users=DB::table('users')->whereDate('date',Carbon::yesterday())->count();
        return view('admins.dashboard',[
            'users' => $users,  
            'promoters' => DB::table('users')->where('type','promoter')->count(),
            'pending_deposits' => DB::table('transactions')->where('type','deposit')->where('status','pending')->sum('amount'),
             'pending_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('status','pending')->sum('amount'),
             'successfull_deposits' => DB::table('transactions')->where('type','deposit')->where('status','success')->sum('amount'),
              'successfull_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('status','success')->sum('amount'),
              'rejected_deposits' => DB::table('transactions')->where('status','rejected')->where('type','deposit')->sum('amount'),
              'rejected_withdrawals' => DB::table('transactions')->where('status','rejected')->where('type','withdrawal')->sum('amount'),
              'packages' => DB::table('products')->count()
               ]);
    }
    // site settings
    public function SiteSettings(){

        return view('admins.settings',[
            'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}'),
             'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->json ?? '{}'),
             'general_settings' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json ?? '{}')
        ]);
    }
    // transactions
    public function Transactions(){
       if(request()->has('user_id')){
 $trx=DB::table('transactions')->where('user_id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
   $total=DB::table('transactions')->where('user_id',request()->input('user_id'))->count();
    $today=DB::table('transactions')->where('user_id',request()->input('user_id'))->whereDate('date',Carbon::today())->count();
        $amount=DB::table('transactions')->where('user_id',request()->input('user_id'))->sum('amount');
}else{
         $trx=DB::table('transactions')->orderBy('date','desc')->paginate(10);
         $total=DB::table('transactions')->count();
         $today=DB::table('transactions')->whereDate('date',Carbon::today())->count();
         $amount=DB::table('transactions')->sum('amount');
       }
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $json=$each->json ?? '{}';
            $each->json=json_decode($json);
            $each->user=$user;
           

            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });

        return view('admins.transactions',[
            'trx' => $trx,
            'total' => $total,
            'today' => $today,
            'amount' => $amount
        ]);
    }


    // deposits
    public function Deposits($status){
 if($status == 'all'){
      if(request()->has('user_id')){
 $trx=DB::table('transactions')->where('type','deposit')->where('user_id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
   $total=DB::table('transactions')->where('type','deposit')->where('user_id',request()->input('user_id'))->count();
    $today=DB::table('transactions')->where('type','deposit')->where('user_id',request()->input('user_id'))->whereDate('date',Carbon::today())->count();
        $amount=DB::table('transactions')->where('type','deposit')->where('user_id',request()->input('user_id'))->sum('amount');
}else{
         $trx=DB::table('transactions')->where('type','deposit')->orderBy('date','desc')->paginate(10);
         $total=DB::table('transactions')->where('type','deposit')->count();
         $today=DB::table('transactions')->where('type','deposit')->whereDate('date',Carbon::today())->count();
         $amount=DB::table('transactions')->where('type','deposit')->sum('amount');
       }
 }else{
    if(request()->has('user_id')){
 $trx=DB::table('transactions')->where('type','deposit')->where('status',$status)->where('user_id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
   $total=DB::table('transactions')->where('type','deposit')->where('status',$status)->where('user_id',request()->input('user_id'))->count();
    $today=DB::table('transactions')->where('type','deposit')->where('status',$status)->where('user_id',request()->input('user_id'))->whereDate('date',Carbon::today())->count();
        $amount=DB::table('transactions')->where('type','deposit')->where('status',$status)->where('user_id',request()->input('user_id'))->sum('amount');
}else{
         $trx=DB::table('transactions')->where('type','deposit')->where('status',$status)->orderBy('date','desc')->paginate(10);
         $total=DB::table('transactions')->where('type','deposit')->where('status',$status)->count();
         $today=DB::table('transactions')->where('type','deposit')->where('status',$status)->whereDate('date',Carbon::today())->count();
         $amount=DB::table('transactions')->where('type','deposit')->where('status',$status)->sum('amount');
       }
 }
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $json=$each->json ?? '{}';
            $each->json=json_decode($json);
            $each->user=$user;
           

            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });

        return view('admins.deposits',[
            'trx' => $trx,
            'total' => $total,
            'today' => $today,
            'amount' => $amount,
            'today_head' => $status == 'success' ? 'Todays Successfull Deposit' : ($status == 'all' ? 'Todays Deposits' : 'Todays '.$status.' Deposits'),
            'total_head' => $status == 'success' ? 'Total Successfull Deposit' : ($status == 'all' ? 'Total Deposits' : 'Total '.$status.' Deposits'),
            'type' => 'deposits',
            'status' => $status

        ]);
    }
     // withdrawals
    public function Withdrawals($status){
 if($status == 'all'){
      if(request()->has('user_id')){
 $trx=DB::table('transactions')->where('type','withdrawal')->where('user_id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
   $total=DB::table('transactions')->where('type','withdrawal')->where('user_id',request()->input('user_id'))->count();
    $today=DB::table('transactions')->where('type','withdrawal')->where('user_id',request()->input('user_id'))->whereDate('date',Carbon::today())->count();
        $amount=DB::table('transactions')->where('type','withdrawal')->where('user_id',request()->input('user_id'))->sum('amount');
}else{
         $trx=DB::table('transactions')->where('type','withdrawal')->orderBy('date','desc')->paginate(10);
         $total=DB::table('transactions')->where('type','withdrawal')->count();
         $today=DB::table('transactions')->where('type','withdrawal')->whereDate('date',Carbon::today())->count();
         $amount=DB::table('transactions')->where('type','withdrawal')->sum('amount');
       }
 }else{
    if(request()->has('user_id')){
 $trx=DB::table('transactions')->where('type','withdrawal')->where('status',$status)->where('user_id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
   $total=DB::table('transactions')->where('type','withdrawal')->where('status',$status)->where('user_id',request()->input('user_id'))->count();
    $today=DB::table('transactions')->where('type','withdrawal')->where('status',$status)->where('user_id',request()->input('user_id'))->whereDate('date',Carbon::today())->count();
        $amount=DB::table('transactions')->where('type','withdrawal')->where('status',$status)->where('user_id',request()->input('user_id'))->sum('amount');
}else{
         $trx=DB::table('transactions')->where('type','withdrawal')->where('status',$status)->orderBy('date','desc')->paginate(10);
         $total=DB::table('transactions')->where('type','withdrawal')->where('status',$status)->count();
         $today=DB::table('transactions')->where('type','withdrawal')->where('status',$status)->whereDate('date',Carbon::today())->count();
         $amount=DB::table('transactions')->where('type','withdrawal')->where('status',$status)->sum('amount');
       }
 }
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $json=$each->json ?? '{}';
            $each->json=json_decode($json);
            $each->user=$user;
           

            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });

        return view('admins.withdrawals',[
            'trx' => $trx,
            'total' => $total,
            'today' => $today,
            'amount' => $amount,
            'today_head' => $status == 'success' ? 'Todays Successfull Withdrawals' : ($status == 'all' ? 'Todays Withdrawals' : 'Todays '.$status.' Withdrawals'),
            'total_head' => $status == 'success' ? 'Total Successfull Withdrawals' : ($status == 'all' ? 'Total Withdrawals' : 'Total '.$status.' Withdrawals'),
            'type' => 'withdrawals',
            'status' => $status

        ]); 
    }
    // add product
    public function AddProduct(){
        return view('admins.products.add');
    }
    // manage products
    public function ManageProducts(){
        $products=DB::table('products')->orderBy('date','desc')->paginate(10);

        return view('admins.products.manage',[
            'products' => $products
        ]);
    }
    // edit product
    public function EditProduct(){
        if(!request()->has('id')){
            return;
        }
        return view('admins.products.edit',[
            'product' => DB::table('products')->where('id',request()->input('id'))->first()
        ]);
    }
    // all users
    public function Users($status){
       if(request()->has('user_id')){
         if($status == 'all'){
            $users=DB::table('users')->where('id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
            $total=DB::table('users')->count();
            $today=DB::table('users')->whereDate('date',Carbon::today())->count();
        }else{
             $users=DB::table('users')->where('id',request()->input('user_id'))->where('status',$status)->orderBy('date','desc')->paginate(10);
            $total=DB::table('users')->count();
            $today=DB::table('users')->whereDate('date',Carbon::today())->count();
        }

       }else{
         if($status == 'all'){
            $users=DB::table('users')->orderBy('date','desc')->paginate(10);
            $total=DB::table('users')->count();
            $today=DB::table('users')->whereDate('date',Carbon::today())->count();
        }else{
             $users=DB::table('users')->where('status',$status)->orderBy('date','desc')->paginate(10);
            $total=DB::table('users')->count();
            $today=DB::table('users')->whereDate('date',Carbon::today())->count();
        }

       }
        $users->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->total_deposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->sum('amount');
           $each->total_withdrawn=DB::table('transactions')->where('user_id',$each->id)->where('type','withdrawal')->where('status','success')->sum('amount');
           $each->total_purchase=DB::table('purchased')->where('user_id',$each->id)->count();
            $each->total_purchase_amount=DB::table('purchased')->where('user_id',$each->id)->sum('json->price');
            $username=$each->username;
            $each->total_ref=DB::table('users')->where('ref',$each->username)->count();
           return $each;
        });
        return  view('admins.users',[
            'users' => $users,
            'total' => $total,
            'today' => $today,
            'active' => DB::table('users')->where('status','active')->count(),
            'status'=> $status

        ]);
    }
    // user
    public function User(){
        $user=DB::table('users')->where('id',request()->input('id'))->first();
         $user->frame=Carbon::parse($user->date)->diffForHumans();
           $user->total_deposit=DB::table('transactions')->where('user_id',$user->id)->where('type','deposit')->where('status','success')->sum('amount');
          $user->total_withdrawn=DB::table('transactions')->where('user_id',$user->id)->where('type','withdrawal')->where('status','success')->sum('amount');
          $user->total_purchase=DB::table('purchased')->where('user_id',$user->id)->count();
           $user->total_purchase_amount=DB::table('purchased')->where('user_id',$user->id)->sum('json->price');
            $username=$user->username;
           $user->total_ref=DB::table('users')->where('ref',$user->username)->count();
           $user->total_daily_income=DB::table('purchased')->where('user_id',$user->id)->where('status','active')->sum('json->return');
           $user->total_active_purchase=DB::table('purchased')->where('user_id',$user->id)->where('status','active')->count();
           $user->total_second_ref=DB::table('users')->whereIn('ref',function($q) use($username){
            $q->select('username')->from('users')->where('ref',$username);
           })->count();
           $user->total_ref_earnings=DB::table('transactions')->where('user_id',$user->id)->where('type','commission')->where('json->level','first')->sum('amount');
           $user->total_second_level_earnings=DB::table('transactions')->where('user_id',$user->id)->where('type','commission')->where('json->level','second')->sum('amount');
           
           $user->json=json_decode($user->json ?? '{}');
           return view('admins.user',[
        'user' => $user
      ]);
    }
    // login as user
    public function LoginAsUser(){
        Auth::guard('users')->loginUsingId(request()->input('id'));
       return redirect()->to('users/dashboard');
    }
     // all promoters
    public function Promoters(){
       if(request()->has('user_id')){
       
            $users=DB::table('users')->where('type','promoter')->where('id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
            $total=DB::table('users')->where('type','promoter')->count();
            $today=DB::table('users')->where('type','promoter')->whereDate('date',Carbon::today())->count();
     

       }else{
      
            $users=DB::table('users')->where('type','promoter')->orderBy('date','desc')->paginate(10);
            $total=DB::table('users')->where('type','promoter')->count();
            $today=DB::table('users')->where('type','promoter')->whereDate('date',Carbon::today())->count();
       

       }
        $users->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->total_deposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->sum('amount');
           $each->total_withdrawn=DB::table('transactions')->where('user_id',$each->id)->where('type','withdrawal')->where('status','success')->sum('amount');
           $each->total_purchase=DB::table('purchased')->where('user_id',$each->id)->count();
            $each->total_purchase_amount=DB::table('purchased')->where('user_id',$each->id)->sum('json->price');
            $username=$each->username;
            $each->total_ref=DB::table('users')->where('ref',$each->username)->count();
           return $each;
        });
        return  view('admins.promoters',[
            'users' => $users,
            'total' => $total,
            'today' => $today,
            'active' => DB::table('users')->where('type','promoter')->where('status','active')->count(),
           

        ]);
    }
    // notifications
    public function Notifications(){
        $notifications=DB::table('notifications')->orderBy('date','desc')->paginate(10);
        $notifications->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->status=json_decode($each->status);
            $each->message=json_decode($each->message);
            return $each;
        });
        return view('admins.notifications',[
            'notifications' => $notifications,
            'unread' => DB::table('notifications')->where('status->admin','unread')->count()
        ]);
    }
    // system logs
    public function SystemLogs(){
        $logs=DB::table('logs')->orderBy('date','desc')->paginate(10);
        $logs->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        return view('admins.logs',[
            'logs' => $logs
        ]);
    }
    // purchased products
    public function PurchasedProducts(){
        $purchased=DB::table('purchased')->orderBy('date','desc')->paginate(10);
        $purchased->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->json=json_decode($each->json);
            $each->next_income=Carbon::parse($each->updated)->addDay()->format("D d M Y H:i:s");
            $each->expires=Carbon::parse($each->date)->addDays($each->json->validity)->format("D d M Y H:i:s");
            return $each;
        });
        return view('admins.products.purchased',[
            'purchased' => $purchased
        ]);
    }
    // logout
    public function Logout(){
    Auth::guard('admins')->logout();
    return redirect()->to('admins/login');
    }
      // deposit bank
    public function DepositBank(){
        return view('admins.bank',[
            'banks' => AllBanks(),
            'details' => json_decode(DB::table('settings')->where('key','bank_details')->first()->json ?? '{}')
        ]);
    }
}

