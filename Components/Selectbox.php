<?php
namespace OFM\Components;
require_once OFMHOME."/App/FormElement.php";


class Selectbox extends \OFM\App\FormElement 
{
	public $name;
	public $title;
	public $values = array();
	public $defaultOption = "Select";

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
		$html = $this->renderLabel().'<select name="'.$this->name.'"><option value="">'.$this->defaultOption.'</option>';
		
		foreach($this->values as $opt) {			
			$html .= '<option value="'.$opt[1].'">'.$opt[0].'</option>';
		}		
		return $html.'</select>';
	}
}
