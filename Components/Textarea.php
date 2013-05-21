<?php
namespace OFM\Components;
require_once OFMWWWDIR.OFMDS.OFMHOME."/App/FormElement.php";
class Textarea extends \OFM\App\FormElement
{
    public $cols;
    public $rows;
    public $data;                                             // The content of the textarea
    public $caption;
    
    public function __toString()
    {
        return "<label for=\"{$this->id}\">{$this->caption}</label><textarea name=\"{$this->name}\" id=\"{$this->id}\">{$this->data}</textarea>";
    }
}
