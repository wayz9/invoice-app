<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    public function __construct(public $page, public $desc) {}

    public function render()
    {
        return view('layouts.admin');
    }
}
