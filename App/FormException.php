<?php
namespace OFM\App;


/**
* FormException
*
*
* @package onlineformsmarker
*
* @version 0.1.0
*
*/
class FormException extends \Exception
{
    protected $message = "Unknown FormException";
    
    public function __construct($message, $code = 0, Exception $previous = null) {
        
        // to make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
}
