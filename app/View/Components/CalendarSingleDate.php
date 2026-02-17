<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CalendarSingleDate extends Component
{
    public string $label;
    public string $value;
    public string $name;
    /**
     * Create a new component instance.
     */
    public function __construct($label,$value,$name)
    {
        $this->label = $label;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calendar-single-date');
    }

}
