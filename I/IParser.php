<?php
namespace OFM\Interfaces;

interface IParser
{
    public function get_objs($objs);
    public function parse();
    public function output();
}
