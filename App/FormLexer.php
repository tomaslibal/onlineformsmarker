<?php
namespace OFM\App;
require_once OFMHOME."/I/ILexer.php";

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

	for($i = 0; $i < $len; $i++) {
	       // if not a white-space char:
	       $chr = ord($ascii[$i]);
	       if(($chr>47&&$chr<58)||($chr>64&&$chr<91)||($chr>94&&$chr<123)||($chr>44&&$chr<48)) {
	       $buf .= $ascii[$i];
	       if($tok_started==0)$tok_started=1;
} else if(($chr==32||$chr==10||$chr==9||$chr==41)&&$tok_started==1) {
  array_push($tokens,$buf);
  $buf = '';
  $tok_started=0;
  $this->num_tokens++;
}
	}
	// consider anything in buffer a token
	if(strlen($buf)>0){
	    array_push($tokens,$buf);
	}

	return $tokens;
    }
}

?>
