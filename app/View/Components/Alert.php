<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
  

     public function __construct(
        public string $type,
        public string $message,
    ) {}
    
    // public function shouldRender(): bool
    // {
    //     return Str::length($this->message) == 0;
    // }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {       
        return view('components.alert');
    }


}
