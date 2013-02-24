<?php

/**
* Input form element
*
* @author Tom Libal, tomas<at>libal<dot>eu
*/
class input extends formElement
{
    public $value;
    public $name;
    public $inputType = 'text';
    public $label;
    
    /**
    * Render control
    *
    * @return string
    */
    public function __toString()
    {
        $this->check();
        if(empty($this->name)) {
            $this->name = $this->id;
        }
        $class = '';
        if($this->inputType == 'radio') {
            $class = ' class="short"';
        }
        return $this->renderLabel()."<input{$class} type=\"{$this->inputType}\" value=\"{$this->value}\" name=\"{$this->name}\" id=\"{$this->id}\">";
    }
    
    /**
    * Does necessary checking before the object is turned into a string
    *
    */
    private function check()
    {
        if(empty($this->inputType)) {
            $this->inputType = 'text';
        }
        if(empty($this->name) && !empty($this->id)) {
            $this->name = $this->id;
        }
    }
    
    /**
    * Controls rendering of a label
    *
    * @return string
    */
    private function renderLabel()
    {
        if($this->label) {
    		return "<label for=\"{$this->name}\">{$this->label}</label>";
    	}else {
            return null;
        }
    }
}