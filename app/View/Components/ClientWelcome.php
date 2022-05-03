<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use App\Models\TextDe;
use App\Models\TextEn;

class ClientWelcome extends Component
{

    public $texts;
    public function __construct()
    {
         $this->texts = Session::get('locale')=='de' 
            ? TextDe::where('page','client-welcome')->get() 
            : TextEn::where('page','client-welcome')->get();
    }

    public function render()
    {
        return view('components.client-welcome')
                ->with('texts',$this->texts);
    }
}
