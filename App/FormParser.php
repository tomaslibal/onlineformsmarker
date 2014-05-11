<?php
namespace OFM\App;
require_once OFMHOME."/I/IParser.php";

class FormParser implements IParser
{
    private $objs;
    private $elems;
    public function __construct($objs)
    {
        if(count($objs)>0) $this->get_objs($objs);
    }
    public function get_objs($objs)
    {
        $this->objs = $objs;
    }
    public function parse()
    {
        // parse Tokens into FormElements
        foreach($this->objs as $obj) {
            $tmp = null;
            switch($obj->type) {
            case 'input':
                $tmp = new \OFM\Components\Input();
                while(count($obj->tokens)>0) {
                    $t = array_shift($obj->tokens);
                    if(substr($t, 0, 1)=="#") $tmp->name = substr($t, 1);
                    else $tmp->label .= $t;
                }
                array_push($this->elems, $tmp);
                break;
            }
        }
        return 0;
    }
    public function output()
    {
        foreach($this->elems as $elem) {
            ob_start();
            echo $elem;
            ob_end_flush();
        }
        return 0;
    }
}
