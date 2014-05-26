<?php
// This is the test suite for onlineformsmarker

namespace OFM\Test;

// Config
$totTests = 0;
$totPass = 0;
$totFail = 0;

// Load test cases

$cases = array(
	'formLexer'=>'FormLexer_TestCase',
	'formParser'=>'FormParser_TestCase',
	'input'=>'Input_TestCase');
foreach($cases as $c=>$f) {
	include_once $f . ".php";
}

// Run test cases and display info
foreach($cases as $c=>$f) {
	$cls = "\\OFM\\Test\\" . $f;
	$obj = new $cls;
	$r = call_user_func(array($obj, 'run'));
	$tests = $r['tests'];
	$passing = $r['passed'];
	$failing = $tests-$passing;
	echo "[$f]: tests $tests, passing $passing, failed $failing\n";
	$totTests += $tests;
	$totPass += $passing;
	$totFail += $failing;
}

// All test cases done
$num = count($cases);
echo "\nSummary\n";
echo "Test cases:     $num\n";
echo "Total tests:    $totTests\n";
echo "Total passing:  $totPass\n";
echo "Totatl failing: $totFail\n";

?>