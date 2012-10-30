<?php

/**
* Processes the form markup
*
*/

class processor 
{
    /**
    * Filters out all non-alphabet characters from text
    *
    * @param string $string String from which the alphabet characters will be filtered out
    * @return string
    * @access private
    */
    private function filterOutText($string)
    {
        if(preg_match("/([\w]+)/i", $string, $match)) {
            return $match[0];
        }else {
            return null;
        }  
    }

    public function title($value)
    {
        $title = new title();
    	$title->value = $value[1];
    	return $title;
    }

    public function breaks()
    {
    	$break = new linebreak();
    	return $break;
    }

    public function inputs($val)
    {
    	$tmp = new input();
        $tmp->label = $val[5];
        $tmp->name = $this->filterOutText($val[3]);
        $tmp->value = $val[4];
        
        $tmp->id = $this->filterOutText($val[2]);
        $tmp->inputType = $this->filterOutText($val[1]);
        return $tmp;
    }

    public function textareas($val)
    {
    	$tmp = new textarea();
        
        $tmp->caption = $val[2];

        $tmp->id = $this->filterOutText($val[1]);
        $tmp->name = $this->filterOutText($val[1]);

        return $tmp;
    }

    public function buttons($val)
    {
    	$tmp = new button();
        $tmp->value = $val[3];
        $tmp->type = $this->filterOutText($val[1]);
        
        $tmp->id = $this->filterOutText($val[2]);
        $tmp->name = $this->filterOutText($val[2]);
        return $tmp;
    }

    public function sectioncontrolbox($val)
    {
    	$html = "<div class=\"contbox\">";
    	if($val[1] !== ":first") {
    		$html .= "<div class=\"contbt backbt\">Back</div>";
    	}
    	if($val[1] !== ":last") {
    		$html .= "<div class=\"contbt\" id=\"validatepersonal\">Continue</div>";
    	}
    	$html .= "
                                <div class=\"conttext\">You can go back as many times as you want</div>
                                <div class=\"clearLeft\"></div><!-- /clearLeft -->
                            </div><!-- /contbox -->";
    	return $html;
    }

    public function clearleft()
    {
    	return "<div class=\"clearLeft\"></div>";
    }

    public function selects($val)
    {
    	$select = new selectbox();
    	$select->name = $val[1];
    	$select->title = $val[4];
    	$vals = preg_split("/;/is", $val[2]);
    	$vals = array('a'=>'aaaa');
    	$select->vals = $vals;
    	return $select;
    }
}