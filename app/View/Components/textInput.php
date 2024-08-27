<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $type = "text",
        public ?string $name = null,
        public ?string $placeholder = null,
        public ?string $formId = null,
        public ?string $value = null,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-input');
    }
}
