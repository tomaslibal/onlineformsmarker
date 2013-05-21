<?php
namespace OFM\App;
require_once "./I/IForm.php";
require_once "./App/Processor.php";

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