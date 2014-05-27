<?php
namespace OFM\Test;

include_once 'TestCase.php';
include_once '../App/config.php';
include_once '../Components/Title.php';

class Title_TestCase extends \OFM\Test\TestCase
{
	private $obj;

	public function __construct() 
	{
		$this->obj = $this->renewObj();
	}

	private function renewObj()
	{
		return new \OFM\Components\Title();
	}

	public function run()
	{

		// default
		$str = "<h1></h1>\n";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Default options __toString()");

		// value
		$str = "<h1>Hello World!</h1>\n";
		$this->obj = $this->renewObj();
		$this->obj->value = "Hello World!";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Default options __toString()");		

		return $this->getInfo();
	}
}
?>