<?php
require_once '../App/Form.php';

$testForm = "
TEST FORM
++++++++++++++++++++++++++

(input)Username
(input)Email
(input:password)Your password

(button)Register me!
";

$myForm = new \OFM\App\Form();
$myForm->action = 'sendTo.php';
$myForm->loadString($testForm);
echo $myForm;
?>
