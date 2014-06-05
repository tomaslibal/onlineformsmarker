<?php
/**
 * Tokenizer reads the onlineformsmarker syntax and creates tokens from it.
 * This test case tests if the tokens are correctly created from the syntax.
 *
 */

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

		// basic tokenizing		
		$tmp = $this->obj->tokenize('(input)');
		$this->assertEquals(count($tmp), 1, "One token object should be created");

		// test that number literals 0-9 are being properly tokenized
		$tmp = $this->obj->tokenize('(input 0123456789)');
		$this->assertEquals(count($tmp[0]->tokens), 1, "One token in the object should be present ", __FILE__, __LINE__);
		$this->assertEquals(strcmp('0123456789', $tmp[0]->tokens[0]), 0, "The token should have value of '0123456789'");

		// multiple tokens
		$tmp = $this->obj->tokenize('(button here is some button)');
		$this->assertEquals(count($tmp[0]->tokens), 4, "4 tokens should be present", __FILE__, __LINE__);

		// test that letters a-z are being properly tokenized
		$tmp = $this->obj->tokenize('(input abcdefghjklimnopqrstuvwxyz)');
		$this->assertEquals(count($tmp[0]->tokens), 1, "One token in the object should be present");
		$this->assertEquals(strcmp('abcdefghjklimnopqrstuvwxyz', $tmp[0]->tokens[0]), 0, "The token should have value of 'abcdefghjklimnopqrstuvwxyz'");	

		// test the letters A-Z are being properly tokenized
		$tmp = $this->obj->tokenize('(input ABCDEFGHJKLIMNOPQRSTUVWXYZ)');
		$this->assertEquals(count($tmp[0]->tokens), 1, "One token in the object should be present");
		$this->assertEquals(strcmp('ABCDEFGHJKLIMNOPQRSTUVWXYZ', $tmp[0]->tokens[0]), 0, "The token should have value of 'ABCDEFGHJKLIMNOPQRSTUVWXYZ'");

		// test unicode
		$tmp = $this->obj->tokenize('(textarea âūtóçabcdef€ hello there)');
		$this->assertEquals(strcmp('âūtóçabcdef€', $tmp[0]->tokens[0]),0, "unicode tokenizer test");
		$this->assertEquals(count($tmp[0]->tokens), 3, "3 tokens total should be there");



		// return the info array
		return $this->getInfo();
	}
}
?>