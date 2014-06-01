<?php
namespace OFM\App;

// Env. configuration
require_once 'config.php';

require_once OFMHOME."/I/IForm.php";
require_once OFMHOME."/App/FormLexer.php";
require_once OFMHOME."/App/FormParser.php";


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

	public $standalone = false;

	// dependencies
	private $lexer = null;
	private $parser = null;

	//
	public function __construct(\OFM\Interfaces\ILexer $lexer, \OFM\Interfaces\IParser $parser)
	{
		$this->lexer  = $lexer;
		$this->parser = $parser;
	}
	
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
            $toks = $this->lexer->tokenize($this->content);
            $this->parser->get_objs($toks);
            $this->parser->parse();
            $return .= $this->parser->output(false);	
		}catch(FormException $e) {
			$this->content = $e->getMessage();
		}
		
		$return .= "</form>";
	    return $return;
	}
}
?>