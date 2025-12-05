<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class UsersPostRequestController extends Controller
{
    // Register
    public function Register(){
        // if(DB::table('users')->where('email',request()->input('email'))->count() > 0){
        //     return response()->json([
        //         'message' => 'Email address has been taken',
        //         'status' => 'error'
        //     ]);
        // }
        if(DB::table('users')->where('mobile',request('mobile'))->exists()){
            return response()->json([
                'message' => 'Mobile number already exists',
                'status' => 'error'
            ]);
        }
         if(DB::table('users')->where('username',request()->input('username'))->count() > 0){
            return response()->json([
                'message' => 'Username has been taken',
                'status' => 'error'
            ]);
        }
        $username=strtolower(str_replace([' ','-'],'_',request()->input('username')));
        $email=$username.'@gmail.com';
        DB::table('users')->insert([
            'uniqid' => strtoupper(Str::random(16)),
            'username' => $username,
            'email' => $email,
            'name' => request()->input('name'),
            'mobile' => request()->input('mobile'),
            'password' => Hash::make(request()->input('password')),
            'withdrawal' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json ?? '{}')->signup_bonus ?? 0,
            'status' => 'active',
            'date' => Carbon::now(),
            'updated' => Carbon::now(),
            'photo' => 'avatar.svg',
            'ref' => request('ref') == '' ? '' : DB::table('users')->where('uniqid',request()->input('ref'))->first()->username
        ]);
        DB::table('notifications')->insert([
            'user_id' => DB::table('users')->where('username',$username)->first()->id,
            'message' => json_encode([
                'user' => 'Registration Success',
                'admin' => '<a class="b c-primary" href="'.url('admins/user?id='.DB::table('users')->where('username',$username)->first()->id.'').'">@'.$username.'</a> Just Registerd on the site'
            ]),
            'status' => json_encode([
                'user' => 'read',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Registration successfull,redirecting to login....',
            'status' => 'success',
            'url' => url('login')
        ]);
    }
    // login
    public function Login(){
        if(DB::table('users')->where('mobile',request()->input('id'))->orWhere('username',request()->input('id'))->count() == 0){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ]);
        }
        $select=DB::table('users')->where('username',request()->input('id'))->orWhere('mobile',request()->input('id'))->first();
        if($select->status == 'banned'){
              return response()->json([
                'message' => 'Your account was banned,contact support',
                'status' => 'error'
            ]);
        }
        if(Hash::check(request()->input('password'),$select->password)){
            Auth::guard('users')->loginUsingId($select->id,true);
            DB::table('logs')->insert([
                'user_id' => Auth::guard('users')->user()->id,
                'ip' => request()->ip(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Login Successfull',
                'status' => 'success',
                'url' => url('users/dashboard')
            ]);
        }
         else{
            return response()->json([
                'message' => 'Invalid password',
                'status' => 'error'
            ]);

         }
    }
    // add bank
    public function AddBank(){
        $account_number=request('account_number');
        $account_name=request('account_name');
        $bank_key=request('bank_key');
        // return response()->json([
        //     'status' => 'error',
        //     'message' => $bank_key
        // ]);
     
        foreach(PaystackBanks()->data as $data){
            if($data->id == $bank_key){
                $bank_code=$data->code;
                $bank_name=$data->name;
               break;
            }
        }
        if(config('settings.withdrawal') == 'auto'){
            $response=Http::withToken(env('PSTCK_SECRET_KEY'))->post('https://api.paystack.co/transferrecipient',[
                'type' => 'nuban',
                'name' => Auth::guard('users')->user()->name,
                'account_number' => $account_number,
                'bank_code' => $bank_code,
                'currency' => 'NGN' 
            ]);
            if($response->successful()){
            $data=$response()->json();
            if($data['status'] == true){
                DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                    'recipient' => json_encode($data)
                ]);

            }else{
                return response()->json([
                    'message' => 'An unknown error occured please try again',
                    'status' => 'error'
                ]);
            }
            }else{
                return response()->json([
                    'message' => 'An unknown error occured please try again',
                    'status' => 'error'
                ]);
            }

        }

      DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'bank' => json_encode([
            'account_number' => $account_number,
            'account_name' => $account_name,
            'bank_id' => $bank_key,
            'bank_code' => $bank_code,
            'bank_name' => $bank_name
        ])
        ]);
         DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just linked a bank account',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just linked a bank account'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Account details updated success',
            'status' => 'success'
        ]);
    }
    // update photo
    public function UpdatePhoto(){
        $name=time().request()->file('photo')->getClientOriginalExtension();
        if(request()->file('photo')->move(public_path('images/users'),$name)){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'photo' => $name,
                'updated' => Carbon::now()
            ]);
              DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just updated your photo',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?user_id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just updated his/her photo'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
            return response()->json([
                'message' => 'Profile photo updated successfully',
                'status' => 'success',
                'photo' => asset('images/users/'.$name.'')
            ]);
        }
    }
    // password update
    public function PasswordUpdate(){
        if(!Hash::check(request()->input('current'),Auth::guard('users')->user()->password)){
            return response()->json([
                'message' => 'Invalid current password',
                'status' => 'error'
            ]);
        }
        if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('new')))){
            return response()->json([
                'message' => 'New password and Confirm password must match',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'password' => Hash::make(request()->input('new')),
            'updated' => Carbon::now()
        ]);
         DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just updated your account password',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?user_id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just updated his/her account password'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Account password updated successfully',
            'status' => 'success',
            'url' => url()->to('users/profile')
        ]);
    }
    //   complete deposit
public function CompleteDeposit(){
    DB::table('transactions')->insert([
      'uniqid' => strtoupper(uniqid('TRX')),
                'user_id' => Auth::guard('users')->user()->id,
                'type' => 'deposit',
                'class' => 'credit',
                'amount' => request()->input('amount'),
                'json' => json_encode([
                    'gateway' => 'manual',
                    'account_name' => request()->input('account_name'),
                    'bank_name' => request()->input('bank_name'),
                    
                ]),
                'status' => 'pending',
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
              DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just submitted a deposit request',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?user_id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just submitted a deposit request'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
            return response()->json([
                'message' => 'Deposit submitted successfully',
                'status' => 'success',
                'url' => url('users/transactions')
            ]);
}
 
}

