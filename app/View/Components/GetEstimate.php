<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GetEstimate extends Component
{
    public $content;
    public $data;

    public function __construct($content = [], $data = null)
    {
        $this->content = $content;
        $this->data = $data;
    }

    public function render()
    {
        return view('components.get-estimate');
    }
}
