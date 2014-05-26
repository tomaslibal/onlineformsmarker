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
		$this->obj = new \OFM\Components\Input();
	}

	public function run()
	{
		// run default
		$str = $this->obj->__toString();

		// 
		$this->assertEquals(empty($this->obj->id), false, "ID is automatically assigned");

		//
		$a = "<input type=\"text\" value=\"\" id=\"{$this->obj->id}\">";
		$this->assertEquals(0, strcmp($str, $a), "Basic Input render");

		// return the info array
		return $this->getInfo();
	}
}
?>