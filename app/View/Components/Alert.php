<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{

    public $type;
    public $message;

    /**
     * Create a new component instance.
     */
    public function __construct($type, $message, $style = "gray")
    {
        $this->type = $type;
        $this->message = $message;
        $this->style = $style;

        if ($this->type === 'success') {
            $this->style = 'green';
        } else if ($this->type === 'info') {
            $this->style = 'sky';
        } else if ($this->type === 'warning') {
            $this->style = 'amber';
        } else if ($this->type === 'fail' || $this->type === 'error') {
            $this->style = 'red';
        } else {
            $this->style = "gray";
        }
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert')->with('style',$this->style);
    }
}
