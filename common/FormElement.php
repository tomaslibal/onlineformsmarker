<?php
namespace OFM\Common;
/**
* formElement class: basic building block for every form's element class.
* This class could be even abstract...It will never be instatiated
*
* @author Tom.
* @package OnlineFormsMarker
*
* @version 0.0.0
*/
class FormElement
{
    public $type;
    public $id;
    
    public function __construct()
    {
    }
    /**
     * Important part of the class! Each child of this class will have to implement __toString() method to give HTML code of the element
     */
    public function __toString()
    {
        throw new formException("not yet implemented");        
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
