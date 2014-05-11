<?php
namespace OFM\Interfaces;

interface ILexer
{
    // reads a stream of ascii text
    // returns an array of tokens
    public function tokenize($str);
}

?>