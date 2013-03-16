<?php
/**
* Transforms the textual representation of the form mark up language into logical
* parts that can be transformed into HTML code.
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
      $this->processor = new processor();
    }
    
    /**
    * Loads the markup syntax into the object
    *
    * @param string $string
    */
    public function load($string)
    {
       if (strcmp(mb_detect_encoding($string, 'UTF8', true), 'UTF-8') !== 0) { // check if the input is UTF-8 encoded
          $string = utf8_encode($string);
       } 
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
        $RE = array("sectioncontrolbox" => "/\(sectioncontrolbox(|[:\w]+)(|#[\w]+)\)/is",
            "clearleft" => "/\(clearleft\)/is",
            "title" => '/([\w ]+)(\r\n|\n|\r)[\+]{3,}/is',
            "selects" => "/\(select(|box)(|[:\w]+)(|[\[\w\d -\]]+)\)(|[\w \.()]+)/is",
            "breaks" => "/([ ]\-\-[ ])/is",
            "inputs" => "/\(input(|[:\w]+)(|#[\w]+)(|\[[\w]+\])\)(|@@[\w]+@@)([\w \-\_\.()\?\/]+)/i",
            "textareas" => "/\(textarea(|#[\w]+)\)(|@@[\w \?\_\-]+@@)([\w ]+)/i",
            "buttons" => "/\(button(|[:\w]+)(|#[\w]+)\)([\w \!-_]{0,})/i"
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
