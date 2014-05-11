<?php
namespace OFM\Components;
require_once OFMHOME."/App/FormElement.php";

class Button extends \OFM\App\FormElement
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
