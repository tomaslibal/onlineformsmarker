<?php
namespace OFM\Components;

require_once OFMWWWDIR.OFMDS.OFMHOME."/App/FormElement.php";

class Linebreak extends \OFM\App\FormElement 
{
	public function __toString()
	{
		return "<br>";
	}
}
