<?php
namespace OFM\App;
require_once OFMHOME."/I/IParser.php";

require_once OFMHOME."/Components/Input.php";
require_once OFMHOME."/Components/Button.php";
require_once OFMHOME."/Components/Textarea.php";
require_once OFMHOME."/Components/Title.php";

class FormParser implements \OFM\Interfaces\IParser
{
    private $objs = array();
    private $elems = array();

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
                    else if(substr($t, 0, 2)=="@@") $tmp->value = substr($t, 2, strlen($t)-4);
                    else $tmp->label .= $t.' ';
                }
                array_push($this->elems, $tmp);
                break;
            case 'textarea':
                $tmp = new \OFM\Components\Textarea();
                while(count($obj->tokens)>0) {
                    $t = array_shift($obj->tokens);
                    if(substr($t, 0, 1)=="#") $tmp->name = substr($t, 1);
                    else $tmp->data .= $t;
                }
                array_push($this->elems, $tmp);
                break;
            case 'title':
                $tmp = new \OFM\Components\Title();
                while(count($obj->tokens)>0) {
                    $tmp->value .= array_shift($obj->tokens) . ' ';
                }
                array_push($this->elems, $tmp);
                break;
            case 'button':
                $tmp = new \OFM\Components\Button();
                while(count($obj->tokens)>0) {
                    $t = array_shift($obj->tokens);
                    if(substr($t, 0, 1)=="#") $tmp->name = substr($t, 1);
                    else $tmp->value .= $t.' ';
                }
                array_push($this->elems, $tmp);
                break;
            }
        }
        return 0;
    }
    public function output($immediate = true)
    {
        $output = '';
        foreach($this->elems as $elem) {
            if($immediate) {
                ob_start();
                echo $elem;
                ob_end_flush();
            } else {
                $output .= $elem;
            }
        }
        return $immediate ? 0 : $output;
    }
}
