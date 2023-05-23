<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{

    public $alertType;
    public $message;

    /**
     * Create a new component instance.
     */
    public function __construct($alertType, $message)
    {
        $this->alertType = $alertType;
        $this->message = $message;
        $this->colour = "gray";
        $this->icon = "fa-solid fa-message";

        if ($alertType === 'success') {
            $this->colour = 'green';
            $this->icon = "fa-solid fa-square-check";
        } else if ($alertType === 'info') {
            $this->colour = 'sky';
            $this->icon = "fa-solid fa-circle-info";
        } else if ($alertType === 'warning') {
            $this->colour = 'amber';
            $this->icon = "fa-solid fa-circle-exclamation";
        } else if ($alertType === 'fail' || $alertType === 'error') {
            $this->colour = 'red';
            $this->icon = "fa-solid fa-triangle-exclamation";
        }

//        $this->bg = "bg-{$this->colour}-100";
//        $this->text = "text-{$this->colour}-900";
//        $this->border = "border-{$this->colour}-700";
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert')
            ->with('colour', $this->colour)
            ->with("icon", $this->icon);
    }
}
