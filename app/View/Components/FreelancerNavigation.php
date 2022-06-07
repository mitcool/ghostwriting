<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Auth;
use App\Models\Notification;

class FreelancerNavigation extends Component
{
    
    public $notifications;
    public function __construct()
    {
        $this->notifications = Notification::where('user_id',Auth::id())->get();
    }

    public function render()
    {
        return view('components.freelancer-navigation')
                ->with('notifications', $this->notifications);
    }
}
