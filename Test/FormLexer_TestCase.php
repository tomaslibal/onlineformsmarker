<?php
namespace OFM\Test;

include_once 'TestCase.php';
include_once '../App/config.php';
include_once '../App/FormLexer.php';

class FormLexer_TestCase extends \OFM\Test\TestCase
{
	private $obj;

	public function __construct() 
	{
		$this->obj = new \OFM\App\FormLexer();
	}
	public function run()
	{
		// 
		$this->assertEquals($this->obj->tokenize(''), array(), "Empty input string returns empty array");
		
		$tmp = $this->obj->tokenize('(input)');
		$this->assertEquals(count($tmp), 1, "One token should be created");

		// return the info array
		return $this->getInfo();
	}
}
?>