<?php
namespace OFM\Components;
require_once OFMHOME."/App/FormElement.php";


class Selectbox extends \OFM\App\FormElement 
{
	public $name;
	public $title;
	public $values = array();

	public function __construct($name = null, $values = array())
	{
		$this->name = $name;
		$this->values = $values;		
 	}

 	private function renderLabel()
 	{
 		if(empty($this->name)) { 
 			return null; 
 		}else {
 			$caption = ($this->title) ? $this->title : $this->name;
 			return '<label for="'.$this->name.'">'.$caption.'</label>';
 		} 	
 	}

	public function __toString()
	{
		$html = $this->renderLabel().'<select name="'.$this->name.'"><option value="">please select</option>';
		
		preg_match_all("/\[[\w]+=[\w]+\]/i", $this->values, $options);		

		foreach($options[0] as $key=>$option) {			
			preg_match("/\[([\w]+)=([\w]+)\]/i", $option, $tmp);			
			$html .= '<option value="'.$tmp[1].'">'.$tmp[2].'</option>';
		}		
		return $html.'</select>';
	}
}
