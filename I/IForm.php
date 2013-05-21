<?php
namespace OFM\Interfaces;

interface IForm
{
	public function loadString($content); // loads string and makes a form out of it
	public function loadFile($path);
	public function loadXML($path);
	public function loadXMLString($content);

	public function validateForm(); // validates the $this->content;

	public function __toString(); // rendering
}