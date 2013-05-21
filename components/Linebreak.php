<?php
namespace OFM\Components;

require_once "./App/FormElement.php";

class Linebreak extends \OFM\App\FormElement 
{
	public function __toString()
	{
		return "<br>";
	}
}
