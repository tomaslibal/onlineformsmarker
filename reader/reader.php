<?php
/**
* Transforms textual representation of the form mark up language into logical
* parts that can be transformed into HTML code.
*
*
* @package onlineformsmarker
* @subpackage reader
*
*/



class reader
{
    private $data;
    private $dataOk;
    
    public function __construct()
    {
    }
    
    public function load(string $string)
    {
        $this->data = $string;
    }
    
    public function parse()
    {
        $elements = array();
        $inputsRE = "/\(input\)([\w]+)/gi";
        
        preg_match_all($inputsRE, $this->data, $matches, PREG_SET_ORDER);
        
        foreach($matches as $val) {
            $elements[] = new input();
        }
        
        return $elements;
    }
     
    /**
    * Checks if there is valid markup in the loaded string data
    * @return bool
    */
    public function checkMarkUp()
    {
    }
}