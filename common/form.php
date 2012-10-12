<?php

/**
* Form class acts as an entry point for interacting with the form rendering 
* functionality.
*
*
* @package OnlineFormsMarker
*
* @version 0.1.0
*
* // example
* $testForm = "
* TEST FORM
* ++++++++++++++++++++++++++
*
* (input)Username
* (input)Email
* (input:password)Your password
* 
* (button)Register me!
* ";
*
* $myForm = new form();
* $myForm->read($testForm);
* echo $myForm;
* // end of example
*/
class form 
{
    public $action;
    public $enctype;
    public $name; // attribute name depends on the doctype, some doctypes doesn't support this attr.
    public $id;
    public $method;
    
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
        //throw new formException("form rendering not yet implemented");        
        $html = '<form action="'.$this->action.'"';
        if($this->method) {
            $html .= ' method="'.$this->method.'"';
        }
        if($this->enctype) {
            $html .= ' enctype="'.$this->enctype.'"';
        }
        // close the opening tag of the form element
        $html .= '>';
        // render the elements of the form
        foreach($this->elements as $el) {
            $html .= $el;
        }
        $html .= '</form>';
        
        return $html;
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
        $this->elements[$id] = $el;
    }
    
    # Not currently used and because mostly the form will be built from a syntax
    # documents this wont be needed. $this->add() function can be used instead
    #
    #    /**
    #    * Overload function appending a new element to the array of form elements
    #    * 
    #    * @param string $name Name (ID) of the added element
    #    * @param formElement $value Object instance of the added form element
    #    */
    #    public function __set($name, $value)
    #    {
    #        $this->debugData[] = "Appending $name to the elements";
    #        $this->elements[$name] = $value;
    #    }
    
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
        $reader = new reader();
        $reader->load($markup);
        $this->elements = $reader->parse();
    }
        
}