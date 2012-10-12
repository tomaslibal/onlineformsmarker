<?php

/**
* Transforms textual representation of the form mark up language into logical
* parts that can be transformed into HTML code.
*
*
* @package onlineformsmarker
* @subpackage reader
*
* @version 0.1.0
* @author Tom Libal, tomas<at>libal<dot>eu
*/
class reader
{
    private $data;
    private $dataOk;
    
    /**
    * Filters out all non-alphabet characters from text
    *
    * @param string $string String from which the alphabet characters will be filtered out
    * @return string
    * @access private
    */
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
    
    /**
    * Loads the markup syntax into the object
    *
    * @param string $string
    */
    public function load($string)
    {
        $this->data = $string;
    }
    
    /**
    * Textual information representing form markup syntax is processed through
    * sets of regular expression here and corresponding objects are instantiated
    * as defined in the markup syntax source.
    *
    * @return void
    */
    public function parse()
    {
        $elements = array();
        
        // FORM TITLE
        $titleRE = "/([\w ]+).([\+]{1,})/is";
        if(preg_match($titleRE, $this->data, $matches)) {
            $title = new title();
            $title->value = $matches[1];
            
            $elements[] = $title;
        }
        
        // line breakings
        $breaksRE = "/(\s]+\-\-[\s]+)/is";
        $breaksRE = "/(\-\-)/is";
        if(preg_match($breaksRE, $this->data, $matches)) {
            $break = new linebreak();
            $elements[] = $break;
        }
        
        // modifiers i; g (global) modifier for multiple matching is replaced by preg_match_all function usage
        $inputsRE = "/\(input(|[:\w]+)(|#[\w]+)\)(|@@[\w]+@@)([\w ()]+)/i";
        preg_match_all($inputsRE, $this->data, $matches, PREG_SET_ORDER);
        foreach($matches as $val) {
            $tmp = new input();
            $tmp->label = $val[4];

            $tmp->value = $val[3];
            
            $tmp->id = $this->filterOutText($val[2]);
            $tmp->inputType = $this->filterOutText($val[1]);
            
            $elements[] = $tmp;        
        }
        
        // !!!
        $textareasRE = "/\(textarea(|#[\w]+)\)([\w ]{0,})/i";
        preg_match_all($textareasRE, $this->data, $matches, PREG_SET_ORDER);
        foreach($matches as $val) {
            $tmp = new textarea();
            
            $tmp->caption = $val[2];

            $tmp->id = $this->filterOutText($val[1]);
            $tmp->name = $this->filterOutText($val[1]);
            
            
            $elements[] = $tmp;            
        }
        
        $buttonsRE = "/\(button(|[:\w]+)(|#[\w]+)\)([\w ]{0,})/i";
        preg_match_all($buttonsRE, $this->data, $matches, PREG_SET_ORDER);
        foreach($matches as $val) {
            $tmp = new button();
            $tmp->value = $val[3];
            $tmp->type = $this->filterOutText($val[1]);
            
            $tmp->id = $this->filterOutText($val[2]);
            
            $elements[] = $tmp;            
        }
        
        return $elements;
    }
     
    /**
    * Checks if there is valid markup in the loaded string data
    *
    * @return bool
    */
    public function checkMarkUp()
    {
    }
}