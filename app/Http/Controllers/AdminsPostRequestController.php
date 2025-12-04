<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminsPostRequestController extends Controller
{
    // hash
    public function Hash($hash){
        return Hash::make($hash);
    }
    // login
    public function Login(){
        if(DB::table('admins')->where('tag',request()->input('tag'))->count() == 0){
            return response()->json([
                'message' => 'Admin not Found',
                'status' => 'error'
            ]);
        }
        $admin=DB::table('admins')->where('tag',request()->input('tag'))->first();
        if(!Hash::check(request()->input('password'),$admin->password)){
            return response()->json([
                'message' => 'Incorrect password',
                'status' => 'error'
            ]);
        }
        Auth::guard('admins')->loginUsingId($admin->id);
        return response()->json([
            'message' => 'Login Successfull',
            'status' => 'success',
            'url' => url()->to('admins/dashboard')
        ]);
    }
    // finance settings
    public function FinanceSettings(){
        $json=[
              'min_withdrawal' => request()->input('min_withdrawal'),
                'min_deposit' => request()->input('min_deposit'),
                'max_withdrawal' => request()->input('max_withdrawal'),
                'max_deposit' => request()->input('max_deposit'),
                'withdrawal_fee' => request()->input('withdrawal_fee'),
                'withdrawal_status' => request()->input('withdrawal_status')
        ];
        if(DB::table('settings')->where('key','finance_settings')->count() > 0){
            DB::table('settings')->where('key','finance_settings')->update([
             'key' => 'finance_settings',
              'json' => json_encode($json),
              'date' => Carbon::now()
            ]);
              return response()->json([
                'message' => 'Finance Settings updated success',
                'status' => 'success'
            ]);
        } else{
            DB::table('settings')->insert([
              'key' => 'finance_settings',
              'json' => json_encode($json),
              'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Finance Settings saved success',
                'status' => 'success'
            ]);
        }
    }
     // referral settings
    public function ReferralSettings(){
        $json=[
              'first_level' => request()->input('first_level'),
                'second_level' => request()->input('second_level'),
                'method' => request()->input('method')
                
        ];
        if(DB::table('settings')->where('key','referral_settings')->count() > 0){
            DB::table('settings')->where('key','referral_settings')->update([
             'key' => 'referral_settings',
              'json' => json_encode($json),
              'date' => Carbon::now()
            ]);
              return response()->json([
                'message' => 'Referral Settings updated success',
                'status' => 'success'
            ]);
        } else{
            DB::table('settings')->insert([
              'key' => 'referral_settings',
              'json' => json_encode($json),
              'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Referral Settings saved success',
                'status' => 'success'
            ]);
        }
    }
    // general settings
    public function GeneralSettings(){
        $json=[
              'signup_bonus' => request()->input('signup_bonus'),
                'group_link' => request()->input('group_link'),
                'popup_link' => request()->input('popup_link'),
                'popup_message' => request()->input('popup_message'),
                'daily_check_in' => request()->input('daily_check_in')
                
                
        ];
        if(DB::table('settings')->where('key','general_settings')->count() > 0){
            DB::table('settings')->where('key','general_settings')->update([
             'key' => 'general_settings',
              'json' => json_encode($json),
              'date' => Carbon::now()
            ]);
              return response()->json([
                'message' => 'General Settings updated success',
                'status' => 'success'
            ]);
        } else{
            DB::table('settings')->insert([
              'key' => 'general_settings',
              'json' => json_encode($json),
              'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'General Settings saved success',
                'status' => 'success'
            ]);
        }
    }
    // add product
    public function AddProduct(){
        $name=time().'.'.request()->file('photo')->getClientOriginalExtension();
       if(request()->file('photo')->move(public_path('products'),$name)){
        DB::table('products')->insert([
            'photo' => $name,
            'name' => request()->input('name'),
            'price' => request()->input('price'),
            'return' => request()->input('return'),
            'validity' => request()->input('validity'),
            'limit' => request()->input('limit'),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Product Added successfully',
            'status' => 'success',
            'url' => url()->to('admins/products/manage')
        ]);
       }
    }
    
    // edit product
    public function EditProduct(){
        if(request()->hasFile('photo')){
            $name=time().'.'.request()->file('photo')->getClientOriginalExtension();
       if(request()->file('photo')->move(public_path('products'),$name)){
        DB::table('products')->where('id',request()->input('id'))->update([
            'photo' => $name,
            'name' => request()->input('name'),
            'price' => request()->input('price'),
            'return' => request()->input('return'),
            'validity' => request()->input('validity'),
            'updated' => Carbon::now(),
            'limit' => request()->input('limit'),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Product Edited successfully',
            'status' => 'success',
            'url' => url()->to('admins/products/manage')
        ]);
       }
        
    }else{
         DB::table('products')->where('id',request()->input('id'))->update([
         
            'name' => request()->input('name'),
            'price' => request()->input('price'),
            'return' => request()->input('return'),
            'validity' => request()->input('validity'),
             'limit' => request()->input('limit'),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Product Edited successfully',
            'status' => 'success',
            'url' => url()->to('admins/products/manage')
        ]);
    }
    
}
// action user
    public function ActionUser($action){
      if($action == 'credit'){
          DB::table('users')->where('id',request()->input('user_id'))->update([
            request()->input('wallet') => DB::raw(''.request()->input('wallet').' + '.request()->input('amount').''),
            'updated' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'User Creditted successfully',
           'status' => 'success'
        ]);
      }else{
          DB::table('users')->where('id',request()->input('user_id'))->update([
            request()->input('wallet') => DB::raw(''.request()->input('wallet').' - '.request()->input('amount').''),
            'updated' => Carbon::now()
        ]);
         return response()->json([
            'message' => 'User Debitted successfully',
           'status' => 'success'
        ]);
      }
    }
     // add bank
    public function AddBank(){
        $json=[
            'account_number' => request()->input('account_number'),
            'bank_code' => request()->input('bank_name'),
            'account_name' => request()->input('account_name')
        ];
        if(DB::table('settings')->where('key','bank_details')->count() == 0){
            DB::table('settings')->insert([
                'key' => 'bank_details',
                'json' => json_encode($json),
                'date' => Carbon::now() 
            ]);
            return response()->json([
                'message' => 'Bank details saved successfully',
                'status' => 'success'
            ]);
        }else{
  DB::table('settings')->where('key','bank_details')->update([
                
                'json' => json_encode($json),
                'date' => Carbon::now() 
            ]);
            return response()->json([
                'message' => 'Bank details updated successfully',
                'status' => 'success'
            ]);
        }
    }
}
