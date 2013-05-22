OnlineFormsMarker
=================

This is a rendering app for my form markup syntax. It takes input in textual form or
the OOP methods of the form and components can be used to design and compose the form. 
The result is rendered as HTML code.

Example
-------------

![Image showing an example of OnlineFormsMarker](http://libal.eu/imghost/OFM_Capture_new.PNG "Example of OnlineFormsMarker")
<br>Input-as-text example demonstrating the basic syntax and use
<br>Result in a web browser running on a local server (some CSS was used)

Syntax
------

### Input

Default input with a label:
<pre><code>(input)LABEL_OF_THE_INPUT
</code></pre>

Specifying the input's type:
<pre><code>(input:INPUT_TYPE)
</code></pre>
INPUT_TYPE corresponds to the HTML valid `<input type="INPUT_TYPE">` types.

Specifying the input's ID:
<pre><code>(input#INPUT_ID)</code></pre>

Predefined value of an input:
<pre><code>(input)@@VALUE@@Your name
</code></pre>

VALUE can be any text.

### Textarea

Default (empty) textarea:
<pre><code>(textarea)
</code></pre>

Content of the textarea:
<pre><code>(textarea)@@CONTENT HERE@@
</code></pre>

Caption of the textarea:
<pre><code>(textarea)LABEL_HERE</code></pre>

### Button

Default button:
<pre><code>(button)</code></pre>

Button type:
<pre><code>(button:BUTTON_TYPE)</code></pre>
BUTTON_TYPE corresponds to valid HTML `<button type="BUTTON_TYPE">` types.

### Selectbox

Default:
<pre><code>(selectbox)</code></pre>

Specifying the options of the selectbox:
<pre><code>(selectbox[opt1=val1][opt2=val2]...[optN=valN])</code></pre>

### Title

One line of text with at leat 3 `+` symbols on the line beneath
<pre><code>TITLE
+++++++++++++++++</code></pre>

Form class
----------

The class is located at onlineformsmarker/common/form.php

### Public properties

* action `$form->action`
* method `$form->method`
* enctype `$form->enctype`
* name `$form->name` (note that not all DOCTYPES support this attribute)
* id `$form->id`

------------------
Version May 22, 2013
