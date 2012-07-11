<?php

class input extends formElement
{
    public $value;
    public $inputType = 'text';
    
    public function __toString()
    {
        $this->check();
        return $this->renderLabel()."<input type=\"{$this->inputType}\" value=\"{$this->value}\" id=\"{$this->id}\">";
    }
    
    private function check()
    {
        if(empty($this->inputType)) {
            $this->inputType = 'text';
        }
        if(empty($this->name) && !empty($this->id)) {
            $this->name = $this->id;
        }
    }
    
    private function renderLabel()
    {
        if($this->label) {
    		return "<label for=\"{$this->name}\">{$this->label}</label>";
    	}
    }
}