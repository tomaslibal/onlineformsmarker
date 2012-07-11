<?php

/**
*
* formElement
*
*
* @package OnlineFormsMarker
*
* @version 0.0.0
*
*/

class formElement
{
    public $type;
    public $id;
    
    public function __construct()
    {
    }
    
    public function __toString()
    {
        throw new formException("not yet implemented");        
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}