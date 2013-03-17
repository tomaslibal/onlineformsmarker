<?php
namespace OFM\Components;

class Button extends \OFM\Common\formElement
{
    public $type = "button";    
    public $value;
    public $name;
    public $disabled;
    
    public function __toString()
    {
        return "<button id=\"{$this->id}\" type=\"{$this->type}\" name=\"{$this->name}\">{$this->value}</button>";
    }
}
