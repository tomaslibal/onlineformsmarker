<?php
namespace OFM\App;
require_once OFMHOME."/I/ILexer.php";

class Token
{
    public $id = '';
    public $name = '';
    public $type = 'input';
    public $label = '';
    public $data = '';
    public $tokens;
}

class FormLexer implements \OFM\Interfaces\ILexer
{
    private $num_tokens = 0;

    public function tokenize($str)
    {
	$ascii = utf8_decode($str);
	$len   = strlen($ascii);
	
	$buf = '';
    $tok_started = 0; // any non-white-space
    $el_started = 0; // (input)
    $tokens = array();
    $objs = array();

	for($i = 0; $i < $len; $i++) {
        $chr = ord($ascii[$i]);
        // "(" is a start of new object
        if($chr==40){
            $el_started = 1;
            $tmp = new Token();
            continue;
        }         
	    if(($chr>47&&$chr<58)||($chr>64&&$chr<91)||($chr>94&&$chr<123)||($chr>44&&$chr<48)) {
	        $buf .= $ascii[$i];
	        if($tok_started==0)$tok_started=1;
        } else if(($chr==32||$chr==9)&&$tok_started==1) {
            array_push($tokens,$buf);
            $buf = '';
            $tok_started=0;
            $this->num_tokens++;
        }
        // New line feed,")", or end of the stream close the object if it was open
        if(($chr==10||$chr==41||$i==$len)&&$el_started==1) {
            //$tmp = new \OFM\App\Token();
            //$tmp = new Token();
            if(strlen($buf)>0) {
                array_push($tokens, $buf);
                $buf='';
                $tok_started=0;
                $this->num_tokens++;
            }
            $tmp->type = array_shift($tokens);
            $tmp->tokens = $tokens;
            $tokens = array();
            $el_started=0;
            array_push($objs, $tmp);
        }
   }

   return $objs;
   }
}

?>