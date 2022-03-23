<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Notification;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadFile($request_file,$path){
        $file_with_extension = $request_file->getClientOriginalName();
        $file_name_only = pathinfo($file_with_extension, PATHINFO_FILENAME);
        $file_extension_only = $request_file->getClientOriginalExtension();
        $new_file_to_store = $file_name_only . "_" . time() . "." .$file_extension_only;
        $request_file->move(base_path().$path, $new_file_to_store);
        return $new_file_to_store;
    }

   public function unlinkFile($path_to_file){
        try {
            unlink($path_to_file);
        }
        catch(\Exception $e) {
           info($e->getMessage());
        }
    }

    public function insertNotification($message,$user_id){
        
        $notification = new Notification();
        $notification->message  = $message;
        $notification->user_id = $user_id;
        $notification->save();
    }

}
