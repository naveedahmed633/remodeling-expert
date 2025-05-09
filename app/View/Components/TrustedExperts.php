<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TrustedExperts extends Component
{
    public $content;

    /**
     * Create a new component instance.
     *
     * @param array $content
     */
    public function __construct($content = [])
    {
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trusted-experts');
    }
}
