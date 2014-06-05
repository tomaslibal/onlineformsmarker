<?php
namespace OFM\Test;

include_once 'TestCase.php';
include_once '../App/config.php';
include_once '../App/FormFactory.php';


class FormFactory_TestCase extends \OFM\Test\TestCase
{

	public function run()
	{
		// test the create() method which should return a Form object
		$this->assertEquals(is_a(\OFM\App\FormFactory::create(), "\OFM\App\Form"), true, "Return value should be an object of \OFM\App\Form class");

		// test the quick() creation method
		$this->assertEquals(is_a(\OFM\App\FormFactory::quick(''), "\OFM\App\Form"), true, "Return value should be an object of \OFM\App\Form class");		

		// return the info array
		return $this->getInfo();
	}
}
?>