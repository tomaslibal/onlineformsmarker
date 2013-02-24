<?php
/**
* Processes the form markup supplied from the reader class (reader.php).
* The markup is read in the reader class where regular expressions are used to find passages of markup signs. These signs are replaced with HTML code supplied by this processor class. The HTML code is in fact created by form components themselve and passed on to here.
*
* @author Tom.
* @package onlineformsmarker
* @version 0.5
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
    /**
     * Creates HTML code for the title of the form
     *
     */
    public function title($value)
    {
        $title = new title();
    	$title->value = $value[1];
    	return $title;
    }
    /**
     * Creates a HTML code for breaks in the form
     *
     */
    public function breaks()
    {
    	$break = new linebreak();
    	return $break;
    }
    /**
     * Creates HTML code for the inputs in the form
     *
     */
    public function inputs($val)
    {
    	$tmp = new input();
        $tmp->label = $val[5];
        $tmp->name = $this->filterOutText($val[3]);
        $tmp->value = $this->filterOutText($val[4]);
        
        $tmp->id = $this->filterOutText($val[2]);
        $tmp->inputType = $this->filterOutText($val[1]);
        return $tmp;
    }
    /**
     * Creates HTML code for textareas in the form
     *
     */
    public function textareas($val)
    {
    	$tmp = new textarea();
        
        $tmp->caption = $val[2];

        $tmp->id = $this->filterOutText($val[1]);
        $tmp->name = $this->filterOutText($val[1]);

        return $tmp;
    }
    /**
     * Creates HTML code for buttons in the form
     *
     */
    public function buttons($val)
    {
    	$tmp = new button();
        $tmp->value = $val[3];
        $tmp->type = $this->filterOutText($val[1]);
        
        $tmp->id = $this->filterOutText($val[2]);
        $tmp->name = $this->filterOutText($val[2]);
        return $tmp;
    }
    /**
     * Creates HTML code for "section control box". That's a div with "back" and "continue" buttons at the end of a fieldset. The functionality is JavaScript enabled only.
     * @param string $val
     * @return string
     */
    public function sectioncontrolbox($val)
    {
    	$html = "<div class=\"contbox\">";
    	if($val[1] !== ":first") { // first control box doesn't have "back" button. Nowhere to go back.
    		$html .= "<div class=\"contbt backbt\">Back</div>";
    	}
    	if($val[1] !== ":last") { // last control box doesn't have "continue" button. Nowhere to continue to.
    		$html .= "<div class=\"contbt\" id=\"validatepersonal\">Continue</div>";
    	}
    	$html .= "
                                <div class=\"conttext\">You can go back as many times as you want</div>
                                <div class=\"clearLeft\"></div><!-- /clearLeft -->
                            </div><!-- /contbox -->";
    	return $html;
    }
    /**
     * Creates HTML code for CSS clear: left;
     * @return string
     */
    public function clearleft()
    {
    	return "<div class=\"clearLeft\"></div>";
    }
    /**
     * Creates HTML code for select boxes
     * !!!not functional atm
     * @param string $val
     * @return string
     */
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
