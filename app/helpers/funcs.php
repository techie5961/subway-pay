<?php
use Illuminate\Support\Facades\DB;
function AdminsNotificationAmount(){
    $notifications=DB::table('notifications')->where('status->admin','unread')->count();
    
    if($notifications > 0){
        if($notifications >= 99){
            $notifications='99+';
        }
        if(strlen($notifications) < 2){
            return " <div style='padding:2px 10px' class='data-amount'>$notifications</div>";
        }else{
            return " <div class='data-amount'>$notifications</div>";
        }
    }
}