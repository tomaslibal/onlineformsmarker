<?php
require_once '../onlineformsmarker.php';

$testForm = "
TEST FORM
++++++++++++++++++++++++++

(input)Username
(input)Email
(input:password)Your password

(button)Register me!
";

$myForm = new OFM\Common\Form();
$myForm->action = 'sendTo.php';
$myForm->read($testForm);
echo $myForm;
?>
