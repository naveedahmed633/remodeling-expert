<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GetEstimate extends Component
{
    /**
     * The component's data, you can pass data to the component if needed.
     */ 
    
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.get-estimate');
    }
}
