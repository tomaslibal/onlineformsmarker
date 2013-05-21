<?php
namespace OFM\App;

// Environment setting
/**
 * Defines a Constant
 * @param string $name Name of the constant
 * @param string $value Value of the constant
 * @return bool
 */
function defineConst($name, $value)
{
    if(!defined($name)) {
	    define($name, $value);
	    return true;
	}else {
		return false;
	}
}

// Environment settings
defineConst("OFM", "OFM"); // online forms marker
defineConst(OFM."DS", DIRECTORY_SEPARATOR);
defineConst(OFM."HOME", "onlineformsmarker");
defineConst(OFM."WWWDIR", dirname(dirname(dirname(__FILE__))));

require_once OFMWWWDIR.OFMDS.OFMHOME."/I/IForm.php";
require_once OFMWWWDIR.OFMDS.OFMHOME."/App/Processor.php";

class Form implements \OFM\Interfaces\IForm
{
	private $content; 

	public function loadString($content)
	{
		$this->content = $content;
		return true;		
	} // loads string and makes a form out of it
	public function loadFile(){}
	public function loadXML(){}

	public function validateForm(){} // validates the $this->content;

	public function __toString()
	{
		$p = new Processor();
		$this->content = $p->parse($this->content);
	    return $this->content;			
	} // rendering
}
