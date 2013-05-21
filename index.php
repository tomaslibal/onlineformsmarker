<?php

require_once "./App/Form.php";

$test = "TEST
++++++++++
(input:password)Test1
(button)Heyaa!";
$form = new OFM\App\Form();
$form->loadString($test);
echo $form;