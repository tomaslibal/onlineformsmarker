<?php

class input extends formElement
{
    public $value;
    public $inputType = 'text';
    
    public function __toString()
    {
        $this->check();
        return "<input type=\"{$this->inputType}\" value=\"{$this->value}\" id=\"{$this->id}\">";
    }
    
    private function check()
    {
        if(empty($this->inputType)) {
            $this->inputType = 'text';
        }
    }
    
}