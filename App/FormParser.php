<?php
namespace OFM\App;
require_once OFMHOME."/I/IParser.php";

require_once OFMHOME."/Components/Input.php";
require_once OFMHOME."/Components/Button.php";
require_once OFMHOME."/Components/Textarea.php";
require_once OFMHOME."/Components/Title.php";
require_once OFMHOME."/Components/Selectbox.php";

/**
 * This is a parser in the process of:
 * 
 * tokenize -> parse -> render
 *
 * Currently, it has an array of token objects injected and this array of objects
 * is processed such that from each known token a new FormElement object is 
 * created.
 *
 * This means that the FormElement objects are coupled inside the parse() method.
 * Ideally, the Parser would use more loose coupling. The "instantiator" check
 * and methods could be parts of the FormElements themselve. This would make it
 * easier to test the methods.
 */
class FormParser implements \OFM\Interfaces\IParser
{
    private $objs = array();
    private $elems = array();

    public function __construct($objs = array())
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
                    else if(substr($t, 0, 1)==":") $tmp->inputType = substr($t, 1);
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
                    else if(substr($t, 0, 2)=="@@") $tmp->data .= substr($t, 2, strlen($t)-2).' ';
                    else if(substr($t, -2)=="@@") $tmp->data .= substr($t, 0, strlen($t)-2).' ';
                    else $tmp->data .= $t.' ';
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
            case 'selectbox':
                $tmp = new \OFM\Components\Selectbox();
                while(count($obj->tokens)>0){
                    $t = array_shift($obj->tokens);
                    if(substr($t, 0, 1)=="[") {
                        $arr=explode("=", substr($t, 1, strlen($t)-2)); // -2 because the str is already 1 char shorter from the start
                        array_push($tmp->values, $arr);
                        //print_r($arr);
                    }
                }
                array_push($this->elems, $tmp);
                break;
            case 'button':
                $tmp = new \OFM\Components\Button();
                while(count($obj->tokens)>0) {
                    $t = array_shift($obj->tokens);
                    if(substr($t, 0, 1)=="#") $tmp->name = substr($t, 1);
                    else if(substr($t, 0, 1)==":") $tmp->type = substr($t, 1);
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
?>