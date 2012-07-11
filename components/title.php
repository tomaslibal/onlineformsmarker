<?php

class title extends formElement 
{
    public $value;

    public function __toString()
    {
        return "<h1>{$this->value}</h1>";
    }
}