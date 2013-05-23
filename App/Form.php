<?php
namespace OFM\App;


// Set the Environment:


/**
 * A helper function to define a constant if the constant's name
 * is not yet in use. Otherwise returns just false.
 *
 * @param string $name Name of the constant
 * @param string $value Value of the constant
 * @return bool
 */
function defineConst($name, $value)
{
    return (!defined($name)) ? define($name, $value) : false;    
}

// Environment settings
defineConst("OFM", "OFM"); // online forms marker
defineConst("OFMDS", DIRECTORY_SEPARATOR);
defineConst("OFMHOME", dirname(dirname(dirname(__FILE__))).OFMDS."onlineformsmarker");


require_once OFMHOME."/I/IForm.php";
require_once OFMHOME."/App/Processor.php";


/**
* The Form objects contain form's element as child objects in Form::$content.
* The rendering is done by the magic funtion __toString() when echo is called
* on the Form object which propagates the call to all child objects which
* have also the __toString() method implemented.
*
* @package onlineformsmarker
* @version 0.5.0
*/
class Form implements \OFM\Interfaces\IForm
{
	private $content; 

	// form attributes
	public $action;
	public $method;
	public $enctype;
	public $name;
	public $id;

	
	public function loadString($content)
	{
		$this->content = $content;
		return true;		
	}
	

	public function loadFile($path)
	{
		if(!file_exists($path)) {
			return false;
		}
		try {
			$this->content = file_get_contents($path);
		}catch (FormExeption $e) {
			return $e->getMessage();
		}
	}

	// if the form is stored as XML match the nodes that represent form elements with the FormElement objects so that they can be rendered (by calling __toString())
	public function loadXML($path)
	{
		throw new FormException("Not yet implemented");
	}

	// the same as above except that here the data are supplied directly and not from the file
	public function loadXMLString($content)
	{
		throw new FormException("Not yet implemented");
	}

	// validates if the OK 
	public function validateForm()
	{
		throw new FormException("Not yet implemented");
	} 

	public function __toString()
	{
		$return = "<form method=\"";
		$return .= ($this->method) ? $this->method.'"' : 'get"';
		$return .= ($this->action) ? 'action="'.$this->action.'"' : null;
		$return .= ($this->enctype) ? 'enctype="'.$this->enctype.'"' : null;
		$return .= ($this->name) ? 'name="'.$this->name.'"' : null;
		$return .= ($this->id) ? 'id="'.$this->id.'"' : null;
		$return .= '>';

		try {
			$p = new Processor();
			$this->content = $p->parse($this->content);	
		}catch(FormException $e) {
			$this->content = $e->getMessage();
		}
		
		$return .= $this->content;
		$return .= "</form>";
	    return $return;
	}
}