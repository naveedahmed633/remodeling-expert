<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HomeTransformSection extends Component
{
   
    public $content;
    public $data;

    public function __construct($content = [], $data = null)
    {
        $this->content = $content;
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home-transform-section');
    }
}
