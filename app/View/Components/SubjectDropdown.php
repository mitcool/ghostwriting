<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Subject;

class SubjectDropdown extends Component
{
    public $subjects;
    public function __construct()
    {
        $this->subjects = Subject::all();
    }

    public function render()
    {
        return view('components.subject-dropdown')
                ->with('subjects', $this->subjects);
    }
}
