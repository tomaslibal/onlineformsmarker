<?php
namespace OFM\Test;

include_once 'TestCase.php';
include_once '../App/config.php';
include_once '../Components/Textarea.php';

class Textarea_TestCase extends \OFM\Test\TestCase
{
	private $obj;

	public function __construct() 
	{
		$this->obj = $this->renewObj();
	}

	private function renewObj()
	{
		return new \OFM\Components\Textarea();
	}

	public function run()
	{

		// default
		$str = "<textarea></textarea>\n";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Default options");

		// data
		$str = "<textarea>Sample data</textarea>\n";
		$this->obj = $this->renewObj();
		$this->obj->data = "Sample data";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Data value");

		// label rendering
		$str = "<label for=\"some_name\">Test caption</label><textarea name=\"some_name\"></textarea>\n";
		$this->obj = $this->renewObj();
		$this->obj->name = "some_name";
		$this->obj->caption = "Test caption";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "Label rendering");

		// id
		$str = "<textarea id=\"myId\"></textarea>\n";
		$this->obj = $this->renewObj();
		$this->obj->id = "myId";
		$out = $this->obj->__toString();
		$this->assertEquals(0, strcmp($str, $out), "ID Attribute");

		return $this->getInfo();
	}
}
?>