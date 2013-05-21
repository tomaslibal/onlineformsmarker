<?php
namespace OFM\Interfaces;

interface IForm
{
	public function loadString($content); // loads string and makes a form out of it
	public function loadFile();
	public function loadXML();

	public function validateForm(); // validates the $this->content;

	public function __toString(); // rendering
}