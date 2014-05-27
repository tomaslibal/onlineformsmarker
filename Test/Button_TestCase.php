<?php
namespace OFM\Test;

include_once 'TestCase.php';
include_once '../App/config.php';
include_once '../Components/Button.php';

class Button_TestCase extends \OFM\Test\TestCase
{
	private $obj;

	public function __construct() 
	{
		$this->obj = $this->renewObj();
	}

	private function renewObj()
	{
		return new \OFM\Components\Button();
	}

	public function run()
	{

		// default
		$str = "<button></button>";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Default options __toString()");

		// value
		$str = "<button>test value</button>";
		$this->obj = $this->renewObj();
		$this->obj->value = "test value";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Value only");

		// id
		$str = "<button id=\"myId\"></button>";
		$this->obj = $this->renewObj();
		$this->obj->id = "myId";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Id only");

		// name
		$str = "<button name=\"some_name\"></button>";
		$this->obj = $this->renewObj();
		$this->obj->name = "some_name";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Name only");

		return $this->getInfo();
	}
}
?>