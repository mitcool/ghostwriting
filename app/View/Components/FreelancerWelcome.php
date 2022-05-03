<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use App\Models\TextDe;
use App\Models\TextEn;

class FreelancerWelcome extends Component
{
    
    public $texts;
    public function __construct()
    {
         $this->texts = Session::get('locale')=='de' 
            ? TextDe::where('page','freelancer-welcome')->get() 
            : TextEn::where('page','freelancer-welcome')->get();
    }
   
    public function render()
    {
        return view('components.freelancer-welcome')
                ->with('texts',$this->texts);
    }
}
