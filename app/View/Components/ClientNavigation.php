<?php

namespace App\View\Components;

use Illuminate\View\Component;

use Auth;
use App\Models\Notification;

class ClientNavigation extends Component
{
    
    public $messages;

    public function __construct()
    {
        $this->messages = Notification::where('user_id',Auth::id())->get();
    }

    public function render()
    {
        return view('components.client-navigation')->with('messages',$this->messages);
    }
}
