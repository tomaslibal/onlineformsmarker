OnlineFormsMarker
=================

Rendering engine for my form markup syntax. Takes input in a textual form or
the methods of the formbuilder can be used to design and compose a form. Renders
the form as HTML code.

Example
-------------

![Image showing an example of OnlineFormsMarker](http://libal.eu/imghost/OFM_demo1.png "Example of OnlineFormsMarker")
<br>Input as text demonstrating the syntax
<br>Result in a web browser running on a local server (depending on used CSS styles)

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

### Title

A line of words with at leat 3 `+` symbols on the line under
<pre><code>TITLE
+++++++++++++++++</code></pre>

Form class
----------

The class is located at onlineformsmarker/common/form.php

### Public properties

* action `$form->action`
* method `$form->method`
* enctype `$form->enctype`
* name `$form->name` (not all DOCTYPES support this attribute)
* id `$form->id`

------------------
Version March 15, 2013
