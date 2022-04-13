<?php

namespace App\View\Components;

use Illuminate\View\Component;

use Session;

use App\Models\TextEn;
use App\Models\TextDe;

class Header extends Component
{
   
    public $texts;
    public function __construct()
    {
        $this->texts = Session::get('locale')=='de' 
            ? TextDe::where('page','header')->get() 
            : TextEn::where('page','header')->get();
    }

    public function render()
    {
        return view('components.header')->with('texts',$this->texts);
    }
}
