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

    /**
     * 
     * @link http://www.php.net/manual/en/function.mb-detect-encoding.php#68607
     */
    public function detectUTF8($string) {
            return preg_match('%(?:
            [\xC2-\xDF][\x80-\xBF]        # non-overlong 2-byte
            |\xE0[\xA0-\xBF][\x80-\xBF]               # excluding overlongs
            |[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}      # straight 3-byte
            |\xED[\x80-\x9F][\x80-\xBF]               # excluding surrogates
            |\xF0[\x90-\xBF][\x80-\xBF]{2}    # planes 1-3
            |[\xF1-\xF3][\x80-\xBF]{3}                  # planes 4-15
            |\xF4[\x80-\x8F][\x80-\xBF]{2}    # plane 16
            )+%xs', $string);
    }

    /**
     * @param {int} $offset is the next offset, because the char can be more then 1 byte wide
     * @link http://www.php.net/manual/en/function.ord.php#109812
     */
    private function ordutf8($string,&$offset) {
        $code = ord(substr($string, $offset,1));
        if ($code >= 128) {        //otherwise 0xxxxxxx
            if ($code < 224) $bytesnumber = 2;                //110xxxxx
            else if ($code < 240) $bytesnumber = 3;        //1110xxxx
            else if ($code < 248) $bytesnumber = 4;    //11110xxx
            $codetemp = $code - 192 - ($bytesnumber > 2 ? 32 : 0) - ($bytesnumber > 3 ? 16 : 0);
            for ($i = 2; $i <= $bytesnumber; $i++) {
                $offset ++;
                $code2 = ord(substr($string, $offset, 1)) - 128;        //10xxxxxx
                $codetemp = $codetemp*64 + $code2;
            }
            $code = $codetemp;
        }
        return $code; 
    }

    private function test_mb_functions() {
        throw new \Exception("not yet implemented");
    }

    public function tokenizeUtf8($str) {
        $len = mb_strlen($str);
        return $this->scanner($str, false, $len);
    }

    public function tokenizeAscii($str) {
        $ascii = utf8_decode($str);
        $len = strlen($ascii);
        return $this->scanner($ascii, true, $len);
    }

    public function scanner($str, $ascii = true, $len = 0) {
        $buf         = '';
        $tok_started = 0; // any non-white-space
        $el_started  = 0; // element, e.g (input) started = 1, not started = 0
        $tokens      = array();
        $objs        = array();

        for($i = 0; $i < $len; $i++) {
            $chr = ($ascii) ? ord($str[$i]) : $this->ordutf8($str, $i);
            // "(" is a start of new object
            if($chr==40){
                $el_started = 1;
                $tmp = new Token();
                continue;
            }
            // if the character is in one of the following intervals, add it to
            // the buffer:
            // [47..59]  58 ":" 59: ";"
            // [64..94] 64=@, 91=[, 93=]
            // [94..123]
            // [44..48]
            // 35 => #
            if(($chr>32&&$chr<127&&$chr!==41)) {
                $buf .= $str[$i];
                if($tok_started==0)$tok_started=1;
            // UNICODE CHARACTERS
            // 0x0020-0x00BB
            // 0x00BC-0x017E
            // 0x017F-0x1EF3
            // 0x2013-0xFB02
            }else if(($chr>127&&$chr<=0x00BB)
                ||($chr>=0x00BC&&$chr<=0x017E)
                ||($chr>=0x017F&&$chr<=0x1EF3)
                ||($chr>=0x2013&&$chr<=0xFB02)) {
                $buf .= mb_convert_encoding('&#'.$chr.';', 'UTF-8', 'HTML-ENTITIES');

            // if the char is a space or a tab,
            // and the token has been started, close/finalize the token,
            // push the buffer into the array of tokens and clear the buffer
            }else if(($chr==32||$chr==9)&&$tok_started==1) {
                array_push($tokens,$buf);
                $buf = '';
                $tok_started=0;
                $this->num_tokens++;
            }
            // fall through - line with no element
            if($chr==10&&$el_started!==1) {
                $buf = '';
                continue;
            }
            // New line feed,")", or end of the stream close the object if it was open
            if(($chr==10||$chr==41||$i==$len)&&$el_started==1) {
                $buflen = ($ascii) ? strlen($buf) : mb_strlen($buf);
                if($buflen>0) {
                    array_push($tokens, $buf);
                    $buf         = '';
                    $tok_started = 0;
                    $this->num_tokens++;
                }
                $tmp->type   = array_shift($tokens);
                $tmp->tokens = $tokens;
                $tokens      = array();
                $el_started  = 0;
                array_push($objs, $tmp);
            }
            
        }
        return $objs;
    }

    public function tokenize($str) {

        if($this->detectUTF8($str)) {
            return $this->tokenizeUtf8($str);
        }else {
            return $this->tokenizeAscii($str);
        }

        return $objs;
    }
}

?>
