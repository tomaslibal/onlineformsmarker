<?php
echo '<!DOCTYPE html>';
?>
<head>
<meta charset="utf-8">
<title>Example 01</title>
<link rel="stylesheet" media="all" href="../Styles/normalize.css">
<link rel="stylesheet" media="all" href="../Styles/Default/style.css">
</head>
<body>
<?php
require_once '../App/Form.php';

$testForm = "(title My Test Form)
    (input #username Username)
(input #email Email)
(input :password #password Your password)
(button Register me!)";

$lexer  = new \OFM\App\FormLexer();
$parser = new \OFM\App\FormParser();
$myForm = new \OFM\App\Form($lexer, $parser);
$myForm->action = 'sendTo.php';
$myForm->loadString($testForm);
echo $myForm;
?>
</body>
</html>
