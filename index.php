<?php

$testForm = "
TEST FORM
++++++++++++++++++++++++++

(input)Username
(input)Email
(input:password)Your password

(button)Register me!
";

include_once 'env.php';
include_once 'classLoader.php';

$myForm = new form();
$myForm->read($testForm);
echo $myForm;

?>