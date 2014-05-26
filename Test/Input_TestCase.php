<?php
namespace OFM\Test;

include_once 'TestCase.php';
include_once '../App/config.php';
include_once '../Components/Input.php';

class Input_TestCase extends \OFM\Test\TestCase
{
	private $obj;

	public function __construct() 
	{
		$this->obj = $this->renewObj();
	}

	private function renewObj()
	{
		return new \OFM\Components\Input();
	}

	public function run()
	{
		// run default
		$str = $this->obj->__toString();

		// Auto ID
		$this->assertEquals(empty($this->obj->id), false, "ID is automatically assigned");

		// Default
		$a = "<input type=\"text\" value=\"\" id=\"{$this->obj->id}\">";
		$this->assertEquals(0, strcmp($str, $a), "Basic Input render");

		// ID attribute
		$this->obj = $this->renewObj();
		$this->obj->id = 'myId';
		$str = $this->obj->__toString();
		$a = "<input type=\"text\" value=\"\" id=\"myId\">";
		$this->assertEquals(0, strcmp($str, $a), "ID assignment and rendering");

		// Label
		$this->obj = $this->renewObj();
		$this->obj->id = 'myId';
		$this->obj->name = 'test';
		$this->obj->label = 'test2';
		$str = $this->obj->__toString();
		$a = "<label for=\"test\">test2</label><input type=\"text\" value=\"\" name=\"test\" id=\"myId\">";
		$this->assertEquals(0, strcmp($str, $a), "Label assignment and rendering");		

		// return the info array
		return $this->getInfo();
	}
}
?>