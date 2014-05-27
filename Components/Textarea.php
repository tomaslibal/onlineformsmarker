<?php
namespace OFM\Components;

require_once OFMHOME."/App/FormElement.php";

class Textarea extends \OFM\App\FormElement
{
    public $cols;
    public $rows;
    public $data;                              // The content of the textarea
    public $caption;
    public $name;
    
    public function __toString()
    {
    	$idAttr   = empty($this->id) ? null : " id=\"{$this->id}\"";
    	$nameAttr = empty($this->name) ? null : " name=\"{$this->name}\"";
    	$label    = empty($this->name) ? null : "<label for=\"{$this->name}\">{$this->caption}</label>";
    	
        return "{$label}<textarea{$nameAttr}{$idAttr}>{$this->data}</textarea>\n";
    }
}
?>