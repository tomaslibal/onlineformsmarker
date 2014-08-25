<?php
// If received a POST request from the JavaScript, print out the rendered HTML
// code, otherwise, printout the HTML form and the JavaScript that will send
// the content of the form in a POST request to this same page to be rendered.
//
// <POST data> --> online-demo.php --> rendered HTML form
// <GET request> --> online-demo.php --> form+JS to send the POST data
//

if(isset($_POST['foo'])) {
    require_once '../App/FormFactory.php';
    $testForm = $_POST['foo'];
    echo \OFM\App\FormFactory::quick($testForm);
    die();
}

?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Online demo</title>
<link rel="stylesheet" media="all" href="../Styles/Default/style.css">
<style>
* { margin: 0; padding: 0; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; -ms-box-sizing; border-box; -o-box-sizing: border-box; }
html, body {
    display: block;
    width: 100%;
    height: 100%;
    overflow: hidden;
    font-family: sans-serif;
}
body:after { content: " "; display: block; clear: both;}
section {
    float: left;
    padding: 20px 10px;
    width: 50%;
    height: 100%;
}
section.form {
}
section.form textarea {
    width: 100%;
    min-height: 400px;
}
section.form button {
    width: 100%;
    min-height: 50px;
    padding: 10px 0;
    display: block;
}
section.result {
    background-color: #DCF2DC;
}
</style>
</head>
<body>

<section class="form">
    <form id="input" action="online-demo.php" method="POST">
        <textarea>
(title Hello World)

(input Your name)

(input :password Your password)

(button Register me)
        </textarea>
        <button type="submit">RENDER</button>
    </form>
    <div>
        <p>Instructions</p>
        <p>Type in the OFM syntax into the form and when done, click the
        "render" button to see the result in the right-hand side of the screen.</p>
    </div>
</section>

<section class="result ofm-form">
</section>

<script type="text/javascript">
(function(window, undefined) {
    "use strict";

    if(!document) return 1;
    if(!document.addEventListener) return 1;

    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("input");
        var sendBt = form.getElementsByTagName("button")[0];
        sendBt.addEventListener("click", function(event) {
            event.preventDefault();
            var oReq = new XMLHttpRequest();
            var data = form.getElementsByTagName("textarea")[0].value;
            console.log(data);

            oReq.onload = function(e) {
                var formData = this.responseText;
                var resultSection = document.getElementsByClassName("result")[0];
                resultSection.innerHTML = formData;
            };

            oReq.open("POST", "online-demo.php", true);
            //oReq.overrideMimeType("application/x-www-form-urlencoded");
            oReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            oReq.send("foo="+encodeURIComponent(data));
            console.log("sending data...");
        });
    });
})(this);
</script>
</body>
</html>