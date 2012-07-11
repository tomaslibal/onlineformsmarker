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
    
    private function filterOutText($string)
    {
        if(preg_match("/([\w]+)/i", $string, $match)) {
            return $match[0];
        }else {
            return null;
        }  
    }
    
    public function __construct()
    {
    }
    
    public function load($string)
    {
        $this->data = $string;
    }
    
    public function parse()
    {
        $elements = array();
        // modifiers i; g (global) modifier for multiple matching is replaced by preg_match_all function usage
        $inputsRE = "/\(input(|[:\w]+)(|#[\w]+)\)([\w ]{0,})/i";
        
        
        preg_match_all($inputsRE, $this->data, $matches, PREG_SET_ORDER);
        
        foreach($matches as $val) {
            $tmp = new input();
            $tmp->label = $val[3];
            
            $tmp->id = $this->filterOutText($val[2]);
            $tmp->inputType = $this->filterOutText($val[1]);
            
            $elements[] = $tmp;            
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