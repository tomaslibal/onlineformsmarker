<?php
namespace OFM\Components;
class Textarea extends \OFM\Common\FormElement
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
