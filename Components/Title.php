<?php
namespace OFM\Components;

require_once OFMWWWDIR.OFMDS.OFMHOME."/App/FormElement.php";

class Title extends \OFM\App\FormElement 
{
    public $value;

    public function __toString()
    {
        return "<h1>{$this->value}</h1>";
    }
}
