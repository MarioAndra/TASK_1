<?php
namespace App\Traits;
use App\Models\User;
use App\Notifications\add_Product;
use Illuminate\Support\Facades\Notification;

trait notification_database{
    public function send_notification($product){
        $admin=User::where('role_id','1')
        ->get();
        if($admin){
            Notification::send($admin,new add_Product($product) );
        }
    }
}
