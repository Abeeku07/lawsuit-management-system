<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextField extends Component
{
    public $name;
    public $label;
    public $type;
    public $placeholder;
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $type
     * @param string $placeholder
     * @param mixed $value
     */
    public function __construct($name, $label, $type = 'text', $placeholder = '', $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.textfield');
    }
}
