<?php
namespace OFM\App;

require_once '../App/Form.php';
require_once '../App/FormLexer.php';
require_once '../App/FormParser.php';

class FormFactory
{
	public static function create()
	{
		$lexer  = new \OFM\App\FormLexer();
		$parser = new \OFM\App\FormParser();
		return new \OFM\App\Form($lexer, $parser);
	}

	public static function quick($string)
	{
		$form = self::create();
		$form->loadString($string);
		return $form;
	}
}
?>