<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersAuthController;
use App\Http\Controllers\UsersPostRequestController;
use App\Http\Controllers\UsersDashboardController;
use App\Http\Controllers\AdminsAuthController;
use App\Http\Controllers\AdminsPostRequestController;
use App\Http\Controllers\AdminsDashboardController;
use App\Http\Controllers\AdminsGetRequestController;
use App\Http\Controllers\UsersGetRequestController;
use App\Http\Middleware\First;
use App\Http\Middleware\UsersAuthChecker;
use App\Http\Middleware\UserLoggedIn;
use App\Http\Controllers\AdminsSearchRequestController;
use App\Http\Middleware\DailyIncomeMiddleware;
use Carbon\Carbon;
use App\Http\Middleware\AdminLoggedIn;
use App\Http\Middleware\AdminsAuthChecker;


Route::get('flutterwave',[
    UsersDashboardController::class,'Flutterwave'
]);
Route::get('ip',[
    UsersDashboardController::class,'Ip'
]);
Route::middleware([ DailyIncomeMiddleware::class ])->group(function(){
Route::get('time',function(){
    $time=Carbon::now()->format('d-M-Y H:i:s');
 return $time;
});
Route::get('purchased',function(){
  
        
        
});



Route::middleware([UserLoggedIn::class])->group(function(){
    Route::get('login',[
    UsersAuthController::class,'Login'
]);
 Route::get('/',[
    UsersAuthController::class,'Login'
]);
Route::get('register',[
    UsersAuthController::class,'Register'
]);
});
Route::prefix('users')->group(function(){
    Route::get('flutterwave/pay',[
        UsersGetRequestController::class,'FlutterwavePay'
    ]);
   Route::middleware([UsersAuthChecker::class])->group(function(){
     Route::get('dashboard',[
        UsersDashboardController::class,'Dashboard'
    ]);
    Route::get('deposit',[
        UsersDashboardController::class,'Deposit'
    ]);
    Route::get('deposit/initiate/flutterwave',[
       UsersGetRequestController::class,'FlutterwaveInitiate'
    ]);
     Route::get('deposit/process/flutterwave/{uniqid}',[
       UsersGetRequestController::class,'FlutterwaveProcess'
    ]);

    Route::get('withdraw',[
        UsersDashboardController::class,'Withdraw'
    ]);
    Route::get('bank',[
        UsersDashboardController::class,'Bank'
    ]);
    Route::get('withdraw/initiate',[
        UsersGetRequestController::class,'Withdraw'
    ]);
    Route::get('transactions',[
        UsersDashboardController::class,'Transactions'
    ]);
    Route::get('profile',[
        UsersDashboardController::class,'Profile'
    ]);
    Route::get('logout',[
        UsersDashboardController::class,'Logout'
    ]);
    Route::get('invite',[
        UsersDashboardController::class,'Invite'
    ]);
    Route::get('products',[
        UsersDashboardController::class,'Products'
    ]);
    Route::get('products/purchased',[
        UsersDashboardController::class,'PurchasedProducts'
    ]);
    Route::get('get/products/purchase',[
        UsersGetRequestController::class,'PurchaseProduct'
    ]);
    Route::get('get/purchase/product/confirm',[
        UsersGetRequestController::class,'PurchaseProductConfirm'
    ]);
    Route::get('referrals',[
        UsersDashboardController::class,'Referrals'
    ]);
    Route::get('daily/check/in',[
        UsersGetRequestController::class,'CheckIn'
    ]);
    Route::get('deposit/checkout',[
        UsersDashboardController::class,"DepositPay"
    ]);
    Route::get('get/paystack/bank/auto/verify',[
        UsersGetRequestController::class,'PaystackBankVerify'
    ]);
    


    // middelware users auth close

 });
 
//  USERS PREFIX GET
 Route::prefix('get')->group(function(){
    Route::get('bank/auto/verify',[
        UsersGetRequestController::class,'AutoVerify'
    ]);
 });


    // USERS POST REQUEST
    Route::prefix('post')->group(function(){
        Route::post('register/process',[
            UsersPostRequestController::class,'Register'
        ]);
         Route::post('login/process',[
            UsersPostRequestController::class,'Login'
        ]);
        Route::post('bank/update/process',[
            UsersPostRequestController::class,"AddBank"
        ]);
        Route::post('update/photo/process',[
            UsersPostRequestController::class,'UpdatePhoto'
        ]);
        Route::post('password/update',[
            UsersPostRequestController::class,'PasswordUpdate'
        ]);
         Route::post('complete/deposit/process',[
            UsersPostRequestController::class,'CompleteDeposit'
        ]);
        




    });
  
});



// admins
Route::prefix('admins')->group(function(){
   Route::middleware([AdminsAuthChecker::class])->group(function(){
     Route::get('login',[
        AdminsAuthController::class,'Login'
    ]);
   });
     Route::middleware([ AdminLoggedIn::class ])->group(function(){
  
        Route::get('dashboard',[
        AdminsDashboardController::class,'Dashboard'
    ]);
    Route::get('site/settings',[
        AdminsDashboardController::class,'SiteSettings'
    ]);
    Route::get('transactions',[
       AdminsDashboardController::class,'Transactions'
    ]);
    Route::get('get/action/transactions',[
        AdminsGetRequestController::class,'ActionTransactions'
    ]);;
    Route::get('get/transactions/popup/render',[
       AdminsGetRequestController::class,'RenderTrxPopup'
    ]);
    Route::get('deposits/{status}',[
        AdminsDashboardController::class,'Deposits'
    ]);
    Route::get('withdrawals/{status}',[
        AdminsDashboardController::class,'Withdrawals'
    ]);
    Route::get('products/add',[
        AdminsDashboardController::class,'AddProduct'
    ]);
    Route::get('products/manage',[
       AdminsDashboardController::class,'ManageProducts'
    ]);
    Route::get('products/edit',[
        AdminsDashboardController::class,'EditProduct'
    ]);
    Route::get('users/{status}',[
        AdminsDashboardController::class,'Users'
    ]);
      Route::get('user',[
        AdminsDashboardController::class,'User'
    ]);
    Route::get('login/as/user',[
        AdminsDashboardController::class,'LoginAsUser'
    ]);
    Route::get('get/mark/as/promoter',[
       AdminsGetRequestController::class,'MarkAsPromoter'
    ]);
    Route::get('promoters',[
        AdminsDashboardController::class,'Promoters'
    ]);
    Route::get('notifications',[
        AdminsDashboardController::class,'Notifications'
    ]);
    Route::get('notifications/mark/as/read',[
        AdminsGetRequestController::class,'MarkAsRead'
    ]);
     Route::get('notifications/mark/all/as/read',[
        AdminsGetRequestController::class,'MarkAllAsRead'
    ]);
    Route::get('system/logs',[
        AdminsDashboardController::class,'SystemLogs'
    ]);
    Route::get('product/delete',[
        AdminsGetRequestController::class,'ProductsDelete'
    ]);
    Route::get('products/purchased',[
        AdminsDashboardController::class,'PurchasedProducts'
    ]);

    Route::get('product/alter',[
        AdminsGetRequestController::class,'AlterProduct'
    ]);
    Route::get('logout',[
        AdminsDashboardController::class,'Logout'
    ]);
    Route::get('deposit/bank',[
        AdminsDashboardController::class,'DepositBank'
    ]);
    Route::get('ban/user',[
        AdminsGetRequestController::class,'BanUser'
    ]);

    });




    // POST
    Route::prefix('post')->group(function(){
        Route::post('login/process',[
            AdminsPostRequestController::class,'Login'
        ]);
        Route::post('finance/settings/process',[
            AdminsPostRequestController::class,'FinanceSettings'
        ]);
         Route::post('general/settings/process',[
            AdminsPostRequestController::class,'GeneralSettings'
        ]);
        Route::post('referral/settings/process',[
            AdminsPostRequestController::class,'ReferralSettings'
        ]);
        Route::post('add/product/process',[
            AdminsPostRequestController::class,'AddProduct'
        ]);
         Route::post('edit/product/process',[
            AdminsPostRequestController::class,'EditProduct'
        ]);
        Route::post('{action}/user/process',[
            AdminsPostRequestController::class,'ActionUser'
        ]);
        Route::post('add/bank/process',[
            AdminsPostRequestController::class,'AddBank'
        ]);





    });


    // search
    Route::prefix('search')->group(function(){
        Route::get('transactions',[
            AdminsSearchRequestController::class,'Transactions'
        ]);
         Route::get('finance/transactions',[
            AdminsSearchRequestController::class,'FinanceTransactions'
        ]);
        Route::get('users/{status}',[
            AdminsSearchRequestController::class,'SearchUsers'
        ]);
         Route::get('promoters',[
            AdminsSearchRequestController::class,'SearchPromoters'
        ]);


    });
});

Route::middleware([First::class])->group(function(){
    Route::get('first',function(){
        return 'Techie';
    });
});

Route::get('hash/{hash}',[
    AdminsPostRequestController::class,'Hash'
]);

});