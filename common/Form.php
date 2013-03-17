<?php
namespace OFM\Common;
/**
* @package OnlineFormsMarker
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
* $MyForm = new \OFM\Common\Form();
* $MyForm->Action = "where_to_send.php";
* $MyForm->read($testForm);
* echo $MyForm;
* // end of example
*/
class Form 
{
    public $action;
    public $enctype;
    public $name; // attribute name depends on the doctype, some doctypes doesn't support this attr.
    public $id;
    public $method = 'post';
    
    // Form's elements
    public $elements = array();
    // Internals:
    public $debug = false;
    private $debugData = array();
    private $output;
    
    public function __construct()
    {
        $this->debugData[] = "Form initializing...";
    }
    
    /**
    * Renders the form
    * @return String
    */
    public function __toString()
    {
        $this->debugData[] = 'Converting the form into string...';
        //throw new formException("form rendering not yet implemented");        
        $html = '<form action="'.$this->action.'"';
        if($this->method) {
            $html .= ' method="'.$this->method.'"';
        }
        if($this->id) {
            $html .= " id=\"{$this->id}\"";
        } 
        if($this->enctype) {
            $html .= ' enctype="'.$this->enctype.'"';
        }
        // close the opening tag of the form element
        $html .= '>';
        // render the elements of the form
        // foreach($this->elements as $el) {
        //     $html .= $el;
        // }
        $html .= $this->output;
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
        $el = new \OFM\Components\$type;
        $el->id = $id;
        
        // append the new element to this form
        $this->elements[$id] = $el;
    }
    
    # Not currently used
    # $this->add() function can be used instead
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
    
    /**
    * Loads text and parses the mark up into HTML
    *
    * @param string $markup
    * @return bool
    */
    public function read($markup)
    {
        $reader = new \OFM\Reader\Reader();
        $reader->load($markup);
        $this->output = $reader->parse();
    }
    
    /**
     * Returns the debug data in an array
     * @return array
     */
    public function printDebugTrace()
    {
	$this->debugData[] = "Getting the debug trace";
        return $this->debugData;
    }    
}
