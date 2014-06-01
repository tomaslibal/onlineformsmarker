<?php
namespace OFM\Interfaces;

interface IForm
{
	public function __construct(\OFM\Interfaces\ILexer $lexer, \OFM\Interfaces\IParser $parser); // dependency injection: lexer and parser

	public function loadString($content); // loads string and makes a form out of it
	public function loadFile($path);
	public function loadXML($path);
	public function loadXMLString($content);

	public function validateForm(); // validates the $this->content;

	public function __toString(); // rendering
}