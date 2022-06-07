<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Language;

class LanguageDropdown extends Component
{
    
    public $languages;
    public function __construct()
    {
       $this->languages = Language::all();
    }

    public function render()
    {
        return view('components.language-dropdown')
                ->with('languages', $this->languages);
    }
}
