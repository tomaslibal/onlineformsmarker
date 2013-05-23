<?php
require_once '../App/Form.php';

$testForm = "
OTHER COMPONENTS IN A FORM
++++++++++++++++++++++++++

(input#name)@@Jane@@Name
(input#familyname)@@Sunshine@@Family name
--
(input:password)@@secret@@Your password
--
(textarea#text)@@Welcome to my profile page@@Profile text
--
(selectbox[f=female][m=male])Gender
--
(button:submit)Save!
";

$myForm = new \OFM\App\Form();
$myForm->action = 'sendTo.php';
$myForm->loadString($testForm);
echo $myForm;
?>
