<?php
echo '<!DOCTYPE html>';
?>
<head>
<meta charset="utf-8">
<title>Example 01</title>
<link rel="stylesheet" media="all" href="../Styles/Default/style.css">
</head>
<body>
<?php

require_once '../App/Form.php';

$testForm = "
(input #name @@Jane@@ Name)
(input #familyname @@Sunshine@@ Family name)
--
(input:password @@secret@@ Your password)
--
(textarea #text @@Welcome to my profile page@@ Profile text)
--
(selectbox[f=female][m=male] Gender)
--
(button :submit Save!)";

$myForm = new \OFM\App\Form();
$myForm->action = 'sendTo.php';
$myForm->loadString($testForm);
echo $myForm;
?>
</body>
</html>