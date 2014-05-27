<?php
namespace OFM\Components;
require_once OFMHOME."/App/FormElement.php";

class Button extends \OFM\App\FormElement
{
    public $type;    
    public $value;
    public $name;
    public $disabled;
    
    public function __toString()
    {
    	$idAttr   = empty($this->id) ? null : " id=\"{$this->id}\"";
    	$typeAttr = empty($this->type) ? null : " type=\"{$this->type}\"";
    	$nameAttr = empty($this->name) ? null : " name=\"{$this->name}\"";

        return "<button{$idAttr}{$typeAttr}{$nameAttr}>{$this->value}</button>";
    }
}
?>