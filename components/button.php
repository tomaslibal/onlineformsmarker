<?php

class button extends formElement
{
    public $type = "button";    
    public $value;
    public $name;
    public $disabled;
    
    public function __toString()
    {
        return "<button type=\"{$this->type}\" name=\"{$this->name}\">{$this->value}</button>";
    }
}