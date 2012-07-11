<?php

/**
* form
*
*
* @package OnlineFormsMarker
*
* @version 0.0.0
*
*/

class form 
{
    public $action;
    public $enctype;
    public $name;
    public $id;
    
    // Form's elements
    public $elements = array();
    
    public $debug = false;
    private $debugData = array();
    
    public function __construct()
    {
        $this->debugData[] = "Form initializing...";
    }
    
    /**
    * Rendering?
    */
    public function __toString()
    {
        $this->debugData[] = 'Converting the form into string...';
        throw new formException("form rendering not yet implemented");        
    }
    
    /**
    * Adds a new form element 
    *
    * @param string $type Name of the form element which is being added
    * @param string $id Unique ID of the added form element
    */
    public function add($type, $id)
    {
        $el = new $type;
        $el->id = $id;
        
        // append the new element to this form
        $this->$id = $el;
    }
    
    /**
    * Overload function appending a new element to the array of form elements
    * 
    * @param string $name Name (ID) of the added element
    * @param formElement $value Object instance of the added form element
    */
    public function __set($name, $value)
    {
        $this->debugData[] = "Appending $name to the elements";
        $this->elements[$name] = $value;
    }
    
    public function __get($name)
    {
    }
    
    /**
    * Uses the built-in feature of the form markup reader
    *
    * @param string $markup
    * @return bool
    */
    public function read($markup)
    {
    }
        
}