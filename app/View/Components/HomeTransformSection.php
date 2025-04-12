<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HomeTransformSection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $heading, $paragraphOne, $paragraphTwo, $paragraphThree, $imagePath, $buttonText, $buttonUrl;

    public function __construct($heading, $paragraphOne, $paragraphTwo, $paragraphThree, $imagePath, $buttonText, $buttonUrl)
    {
        $this->heading = $heading;
        $this->paragraphOne = $paragraphOne;
        $this->paragraphTwo = $paragraphTwo;
        $this->paragraphThree = $paragraphThree;
        $this->imagePath = $imagePath;
        $this->buttonText = $buttonText;
        $this->buttonUrl = $buttonUrl;
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
