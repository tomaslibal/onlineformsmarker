<?php
namespace OFM\Components;
require_once OFMWWWDIR.OFMDS.OFMHOME."/App/FormElement.php";
class Button extends \OFM\App\formElement
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
