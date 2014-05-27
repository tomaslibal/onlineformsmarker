<?php
namespace OFM\Test;

include_once 'TestCase.php';
include_once '../App/config.php';
include_once '../Components/Title.php';

class Button_TestCase extends \OFM\Test\TestCase
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
		return $this->getInfo();
	}
}
?>