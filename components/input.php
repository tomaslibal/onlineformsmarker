<?php

class input extends formElement
{
    public $value;
    public $inputType = 'text';
    
    public function __toString()
    {
        return "<input type=\"{$this->inputType}\" value=\"{$this->value}\" id=\"{$this->id}\">";
    }
    
}