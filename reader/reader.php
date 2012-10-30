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
    private $processor;
    
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
        $RE = array("sectioncontrolbox" => "/\(sectioncontrolbox(|[:\w]+)\)/is",
            "clearleft" => "/\(clearleft\)/is",
            "title" => "/([\w ]+).([\+]+)/is",
            "selects" => "/\(select(|box)(|[:\w]+)(|[\[\w\d -\]]+)\)(|[\w \.()]+)/is",
            "breaks" => "/([ ]\-\-[ ])/is",
            "inputs" => "/\(input(|[:\w]+)(|#[\w]+)(|\[[\w]+\])\)(|@@[\w]+@@)([\w \.()\?]+)/i",
            "textareas" => "/\(textarea(|#[\w]+)\)([\w ]{0,})/i",
            "buttons" => "/\(button(|[:\w]+)(|#[\w]+)\)([\w ]{0,})/i"
            );

        foreach($RE as $key => $val) {
            $this->data = preg_replace_callback($val, array($this->processor, $key), $this->data);
        }
        
        return $this->data;
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