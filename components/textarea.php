<?php
class textarea extends formElement
{
    public $cols;    
    public $rows;
    public $data;
    public $caption;
    
    public function __toString()
    {
        return "{$this->caption}<textarea name=\"{$this->name}\" id=\"{$this->id}\">{$this->data}</textarea>";
    }
}