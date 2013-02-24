<?php

class selectbox extends formElement 
{
	public $name;
	public $title;
	public $values = array();

	public function __construct($name = null, $values = array())
	{
		if($name) {
			$this->name = $name;
		}
		if(count($values)>0) {
			$this->values = $values;
		}
 	}

 	private function renderLabel()
 	{
 		$html = '';
 		if(!empty($this->name)) {
 			$html .= '<label for="'.$this->name.'">'; 
 			if($this->title) {
 				$html .= $this->title;
 			}else {
 				$html .= $this->name;
 			}
  			$html .= '</label>';
 		}
 		
 		return $html;
 	}

	public function __toString()
	{
		$html = $this->renderLabel().'<select name="'.$this->name.'">';
		$html .= '<option value="">please select</option>';
		foreach($this->values as $key=>$val) {
			$html .= '<option value="'.$val.'">'.$key.'</option>';
		}
		$html .= '</select>';
		return $html;
	}
}