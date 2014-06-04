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
require_once '../App/FormFactory.php';

$testForm = "(title My Test Form)
    (input #username Username)
(input #email Email)
(input :password #password Your password)
(button Register me!)";

echo \OFM\App\FormFactory::quick($testForm);
?>
</body>
</html>
