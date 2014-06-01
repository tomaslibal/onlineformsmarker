<?php
echo '<!DOCTYPE html>';
?>
<head>
<meta charset="utf-8">
<title>Example 02</title>
<link rel="stylesheet" media="all" href="../Styles/normalize.css">
<link rel="stylesheet" media="all" href="../Styles/Default/style.css">
</head>
<body>
<?php

require_once '../App/Form.php';

$testForm = "
(input #name @@Jane@@ Name)
(input #familyname @@Sunshine@@ Family name)
--
(input :password @@secret@@ Your password)
--
(textarea #text @@Welcome to my profile page@@ Profile text)
--
(selectbox[f=female][m=male] Gender)
--
(selectbox [opt1=val1] [opt2=val2] selectbox example)
--
(button :submit Save!)";

$lexer  = new \OFM\App\FormLexer();
$parser = new \OFM\App\FormParser();
$myForm = new \OFM\App\Form($lexer, $parser);
$myForm->action = 'sendTo.php';
$myForm->loadString($testForm);
echo $myForm;
?>
</body>
</html>