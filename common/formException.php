<?php
/**
* formException
*
*
* @package OnlineFormsMarker
*
* @version 0.0.0
*
*/
class formException extends Exception
{
    protected $message = "unknown formException";
    
    public function __construct($message, $code = 0, Exception $previous = null) {
        
        // to make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
}