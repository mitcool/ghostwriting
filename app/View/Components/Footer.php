<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use App\Models\TextDe;
use App\Models\TextEn;

class Footer extends Component
{
    public $texts;
    public function __construct()
    {
        $this->texts = Session::get('locale')=='de' 
            ? TextDe::where('page','footer')->get() 
            : TextEn::where('page','footer')->get();
    }

    public function render()
    {
        return view('components.footer')->with('texts',$this->texts);
    }
}
