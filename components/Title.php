<?php
namespace OFM\Components;
class Title extends \OFM\Common\FormElement 
{
    public $value;

    public function __toString()
    {
        return "<h1>{$this->value}</h1>";
    }
}
