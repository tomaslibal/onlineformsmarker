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
</head>
<body>

<section class="form">
    <form id="input" action="online-demo.php" method="POST">
        <textarea></textarea>
        <button type="submit">RENDER</button>
    </form>
</section>

<section class="result">
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