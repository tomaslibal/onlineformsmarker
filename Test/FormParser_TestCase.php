<?php
namespace OFM\Test;

include_once 'TestCase.php';
include_once '../App/config.php';
include_once '../App/FormParser.php';

class FormParser_TestCase extends \OFM\Test\TestCase
{
	private $obj;

	public function __construct() 
	{
		$this->obj = new \OFM\App\FormParser();
	}

	public function dataProvider()
	{

	}

	public function run()
	{

		// return the info array
		return $this->getInfo();
	}
}