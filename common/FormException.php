<?php
namespace OFM\Common;
/**
* formException
*
*
* @package OnlineFormsMarker
*
* @version 0.0.0
*
*/
class FormException extends \Exception
{
    protected $message = "unknown FormException";
    
    public function __construct($message, $code = 0, Exception $previous = null) {
        
        // to make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
}
