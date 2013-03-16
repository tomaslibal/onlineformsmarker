<?php
$htmlList = '';                                               // HTML code of the <ul> containing links to the examples
$files = scandir('.');                                        // read this dir and populate $files with the files of the directory. Each files is one example
foreach($files as $file) {
  if(preg_match("/index.php/i", $file)) continue;             // skip the link to this file
  if(preg_match("/(\w.php$)/", $file))                        // accept only the files ending with .php
    $htmlList .= "<li><a href=\"{$file}\">{$file}</a></li>";
}
$htmlList = preg_replace("/(.*)/is", '<ul>$1</ul>', $htmlList); // add the encompassing <ul> tags
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>OnlineFormsMarker Examples</title>
  <meta name="description" content="OnlineFormsMarker Examples">
  <meta name="viewport" content="width=device-width">
  <!-- <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css"> 
  -->
</head>
<body>
  <header><h1>List of examples</h1></header>
  <?php echo $htmlList; ?>
</body>
</html>
