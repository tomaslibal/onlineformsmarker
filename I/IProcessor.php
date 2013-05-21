<?php
namespace OFM\Interfaces;

interface IProcessor
{
	public function parse($code);
	public function getTextOnly($data);
	//public function route($data); // $element = input, $data = "(input:text#id)InputNameHere"
}