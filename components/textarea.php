<?php
class textarea extends formElement
{
    public $cols;    
    public $rows;
    public $data;
    public $caption;
    
    public function __toString()
    {
        return "<label for="{$this->id}">{$this->caption}</label><textarea name=\"{$this->name}\" id=\"{$this->id}\">{$this->data}</textarea>";
    }
}
