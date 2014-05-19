<?php
require_once '../App/Form.php';

$testForm = "(title My Test Form)
    (input #username Username)
(input #email Email)
(input #password Your password)
(button Register me!)";

$myForm = new \OFM\App\Form();
$myForm->action = 'sendTo.php';
$myForm->loadString($testForm);
echo $myForm;
?>
