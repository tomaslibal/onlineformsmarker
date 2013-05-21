<?php
namespace OFM\App;
require_once OFMHOME."/I/IProcessor.php";

require_once OFMHOME."/Components/Title.php";
require_once OFMHOME."/Components/Input.php";
require_once OFMHOME."/Components/Linebreak.php";
require_once OFMHOME."/Components/Selectbox.php";
require_once OFMHOME."/Components/Textarea.php";
require_once OFMHOME."/Components/Button.php";

class Processor implements \OFM\Interfaces\IProcessor
{
	public function parse($code)
	{
		$RE = array(
            "title" => '/([\w ]+)(\r\n|\n|\r)[\+]{3,}/is',
            "select" => "/\(select(|box)(|[:\w]+)(|[\[\w\d -\]]+)\)(|[\w \.()]+)/is",
            "linebreak" => "/([ ]\-\-[ ])/is",
            "input" => "/\(input(|[:\w]+)(|#[\w]+)(|\[[\w]+\])\)(|@@[\w]+@@)([\w \-\_\.()\?\/]+)/i",
            "textarea" => "/\(textarea(|#[\w]+)\)(|@@[\w \?\_\-]+@@)([\w ]+)/i",
            "button" => "/\(button(|[:\w]+)(|#[\w]+)\)([\w \!-_]{0,})/i"
            );

        foreach($RE as $key => $val) {
            $code = preg_replace_callback($val, array($this, $key), $code);
        }
        
        return $code;
	}

	public function getTextOnly($data)
	{
		if(preg_match("/([\w]+)/i", $data, $match)) {
            return $match[0];
        }else {
            return null;
        }  
	}

	public function select($data){}
	public function linebreak($data){}
	public function textarea($data){}

	public function title($data)
	{
		$tmp = new \OFM\Components\Title();
		$tmp->value = $data[1];
		return $tmp;
	}

	public function input($data)
	{		
		$tmp = new \OFM\Components\Input();
		$tmp->value = $data[4];
		$tmp->name = $data[3];
	 	$tmp->inputType = ($data[1]) ? $this->getTextOnly($data[1]) : null;
	 	$tmp->label = ($data[5]) ? $data[5] : null;
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