<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    public function __construct(public string $pageName, public string $desc) {}

    public function render()
    {
        return view('layouts.admin');
    }
}
