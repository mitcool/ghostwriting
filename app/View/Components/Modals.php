<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Constants\UserMessages;

class Modals extends Component
{
    
    public $password_requirements;
    public function __construct()
    {
        $this->password_requirements = UserMessages::passwordRequirements();
    }

    public function render()
    {
        return view('components.modals')
            ->with('password_requirements', $this->password_requirements);
    }
}
