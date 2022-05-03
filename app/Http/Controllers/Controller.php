<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

use App\Constants\UserRoles;

use Hash;
use Session;

use App\Models\Notification;
use App\Models\User;
use App\Models\TextDe;
use App\Models\TextEn;

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

    public function notifyAdmins($message){
        $admins = User::select('id')->where('role',UserRoles::$adminRole)->get();
        foreach($admins as $admin){
            $this->insertNotification($message,$admin->id);
        }
    }

    public function createUser(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'surname'=>$data['surname'],
        'email' => $data['email'],
        'role' => $data['role'],
        'password' => Hash::make($data['password']),
        'confirmation_code' => Str::random(30)
      ]);
    } 


    public function getTexts($page){

        $texts = Session::get('locale')=='de'
            ? TextDe::where('page',$page)->get()
            : TextEn::where('page',$page)->get();

        return $texts;
    }

}
