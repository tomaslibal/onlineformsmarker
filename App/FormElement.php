<?php
namespace OFM\App;


/**
* FormElement class. The basic building block for every form's element class.
* (This class could be even abstract...It will never be instatiated)
*
* @author Tom.
* @package onlineformsmarker
*
* @version 0.1.0
*/
class FormElement
{
    public $type;
    public $id; // every form HTML element can has an ID
    
    /**
     * Important part of the class! Each child of this class will have to implement __toString() method to give HTML code of the element
     */
    public function __toString()
    {
        throw new FormException("not yet implemented");        
    }
    
    final public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
