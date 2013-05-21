<?php
namespace OFM\Components;

require_once OFMHOME."/App/FormElement.php";

/**
* Input form element
*
* @author Tom Libal, tomas<at>libal<dot>eu
*/
class Input extends \OFM\App\FormElement
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
        if(empty($this->name)) {
            $this->name = $this->id;
        }        
        return $this->renderLabel()."<input type=\"{$this->inputType}\" value=\"{$this->value}\" name=\"{$this->name}\" id=\"{$this->id}\">";
    }
    
    /**
    * Controls rendering of a label
    *
    * @return string
    */
    private function renderLabel()
    {
        return ($this->label) ? "<label for=\"{$this->name}\">{$this->label}</label>" : null;        
    }
}