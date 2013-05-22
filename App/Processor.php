<?php
namespace OFM\App;
require_once OFMHOME."/I/IProcessor.php";

require_once OFMHOME."/Components/Title.php";
require_once OFMHOME."/Components/Input.php";
require_once OFMHOME."/Components/Linebreak.php";
require_once OFMHOME."/Components/Selectbox.php";
require_once OFMHOME."/Components/Textarea.php";
require_once OFMHOME."/Components/Button.php";


// This class parses and processes the form markup syntax
// and creates the form elements as specified in the get go code
class Processor implements \OFM\Interfaces\IProcessor
{
	public function parse($code)
	{
		$RE = array(
            "title" => '/([\w ]+)(\r\n|\n|\r)[\+]{3,}/is',
            
            "selectbox" => "/\(selectbox(:[\w]+)?([\[\w\d -\]]+)?\)([\w \.()]+)?/is",
            
            "linebreak" => "/(.[-]{2}.)/is",
            
            "input" => "/\(input(:[\w]+)?(#[\w]+)?(\[[\w]+\])?\)(@{2}[\w -_]+@{2})?([\w \-\_\.()\?\/]+)?/i",
            
            "textarea" => "/\(textarea(#[\w]{1,})?\)(@{2}[\w -_]+@{2})?([\w -_]+)?/i",
            
            "button" => "/\(button(|[:\w]+)(|#[\w]+)\)([\w \!-_]{0,})/i"
            );

        foreach($RE as $key => $val) {
            $code = preg_replace_callback($val, array($this, $key), $code);
        }
        
        return $code;
	}

	public function getTextOnly($data)
	{
		if(preg_match("/([\w ]+)/i", $data, $match)) {
            return $match[0];
        }else {
            return null;
        }  
	}

	public function selectbox($data)
	{
		$tmp = new \OFM\Components\Selectbox();
		$tmp->name = $data[3];
		$tmp->values = $data[2];
		return $tmp;
	}

	public function linebreak($data)
	{
		return new \OFM\Components\Linebreak();
	}

	public function textarea($data)
	{		
		$tmp = new \OFM\Components\Textarea();
		$tmp->id = $data[1];
		$tmp->data = $this->getTextOnly($data[2]);
		$tmp->caption = $data[3];		
		return $tmp;
	}

	public function title($data)
	{
		$tmp = new \OFM\Components\Title();
		$tmp->value = $data[1];
		return $tmp;
	}

	public function input($data)
	{		
		$tmp = new \OFM\Components\Input();
		$tmp->value = (isset($data[4])) ? $this->getTextOnly($data[4]) : null;
		$tmp->name = (isset($data[3])) ? $this->getTextOnly($data[3]) : null;
	 	$tmp->inputType = (isset($data[1])) ? $this->getTextOnly($data[1]) : null;
	 	$tmp->label = (isset($data[5])) ? $data[5] : null;
	 	return $tmp;
	}

	public function button ($data)
	{	
		$tmp = new \OFM\Components\Button();		
		$tmp->value = $data[3];
		$tmp->id = $this->getTextOnly($data[2]);
		$tmp->type = $this->getTextOnly($data[1]);
		return $tmp;
	}
}