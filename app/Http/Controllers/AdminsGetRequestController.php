<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminsGetRequestController extends Controller
{
    // action transactions
    public function ActionTransactions(){
      
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
       if(request()->input('action') == 'approve'){
         if($trx->type == 'deposit'){
            DB::table('users')->where('id',$trx->user_id)->update([
                'deposit' => DB::raw('deposit + '.$trx->amount.'')
            ]);
            DB::table('transactions')->where('id',request()->input('id'))->update([
                'status' => 'success',
                'updated' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Deposit request approved successfully',
                'status' => 'success'
            ]);
        }else{
            // handle flutterwave here



            DB::table('transactions')->where('id',request()->input('id'))->update([
                'status' => 'success',
                'updated' => Carbon::now()
            ]);
             return response()->json([
                'message' => 'Withdrawal request approved successfully',
                'status' => 'success'
            ]);
        }
       }else{
        if($trx->type == 'deposit'){
            DB::table('transactions')->where('id',request()->input('id'))->update([
                'status' => 'rejected',
                'updated' => Carbon::now()
            ]);
              return response()->json([
                'message' => 'Deposit request rejected successfully',
                'status' => 'success'
            ]);
        }else{
            DB::table('users')->where('id',$trx->user_id)->update([
                'withdrawal' => DB::raw('withdrawal + '.$trx->amount.'')
            ]);
            DB::table('transactions')->where('id',request()->input('id'))->update([
                'status' => 'rejected',
                'updated' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Withdrawal request rejected successfully',
                'status' => 'success'
            ]);
        }
       }
  
    }
    // render transactions popup
    public function RenderTrxPopup(){
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
        $trx->user=DB::table('users')->where('id',$trx->user_id)->first();
        return view('components.sections',[
            'RenderTrxPopup' => true,
            'trx' => $trx,
            'action' => request()->input('action')
        ]);
    }
    // mark as promoter
    public function MarkAsPromoter(){
        $user=DB::table('users')->where('id',request()->input('user_id'))->first();
        if($user->type == 'user'){
            DB::table('users')->where('id',request()->input('user_id'))->update([
                'type' => 'promoter'
            ]);
            return redirect()->to('admins/user?id='.request()->input('user_id').'');
        }else{
            DB::table('users')->where('id',request()->input('user_id'))->update([
                'type' => 'user'
            ]);
            return redirect()->to('admins/user?id='.request()->input('user_id').'');
        }
    }
    // mark as read
    public function MarkAsRead(){
       
            DB::table('notifications')->where('id',request()->input('id'))->update([
                'status->admin' => 'read',
                'updated' => Carbon::now()
            ]);
            return redirect()->to('admins/notifications');
        
    }
     // mark all as read
    public function MarkAllAsRead(){
       
            DB::table('notifications')->update([
                'status->admin' => 'read',
                'updated' => Carbon::now()
            ]);
            return redirect()->to('admins/notifications');
        
    }
    // delete products
    public function ProductsDelete(){
        DB::table('products')->where('id',request()->input('id'))->delete();
        return redirect()->to('admins/products/manage');
    }
    // alter product 
    public function AlterProduct(){
        if(request()->input('status') == 'active'){
            DB::table('purchased')->where('id',request()->input('id'))->update([
                'status' => 'suspended',
                
            ]);
            return redirect()->to('admins/products/purchased');
        }else{
              DB::table('purchased')->where('id',request()->input('id'))->update([
                'status' => 'active',
                
            ]);
            return redirect()->to('admins/products/purchased');
        }
    }
    // ban user
    public function BanUser(){
        $status=DB::table('users')->where('id',request()->input('id'))->first()->status;
        if($status == 'banned'){
            DB::table('users')->where('id',request()->input('id'))->update([
                'status' => 'active'
            ]);
            return redirect()->to('admins/user?id='.request()->input('id').'');
        }else{
             DB::table('users')->where('id',request()->input('id'))->update([
                'status' => 'banned'
            ]);
            return redirect()->to('admins/user?id='.request()->input('id').'');
        }
    }
}
