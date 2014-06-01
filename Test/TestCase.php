<?php
namespace OFM\Test;

class TestCase 
{
	private $tests = 0;
	private $passed = 0;
	private $errors = array();
	private $errMsgs = array();

	public function assertEquals($a, $b, $msg = '', $file = null, $line = null)
	{
		$this->tests++;
		try {
			if ($a === $b) 
				$this->passed++;
			else {
				array_push($this->errMsgs, $msg);
				echo "Failed: ".$msg;
				if ($file) echo " in ".$file.":".$line."\n"; else echo "\n";
			}
		}catch(Exception $e) {
			array_push($this->errors, $e);
		}
		return 0;
	}

	public function getInfo()
	{
		return array(
			'tests'=>$this->tests, 
			'passed'=>$this->passed, 
			'errors'=>$this->errors, 
			'errMsgs'=>$this->errMsgs
			);
	}

}