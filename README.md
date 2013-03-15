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

<pre><code>(input)LABEL_OF_THE_INPUT
</code></pre>

<pre><code>(input:INPUT_TYPE)
</code></pre>

INPUT_TYPE corresponds to the HTML valid `<input type="INPUT_TYPE">` types.

Predefined value of an input:
<pre><code>(input)@@VALUE@@Your name
</code></pre>

VALUE can be any text.

### Textarea

<pre><code>(textarea)
</code></pre>

### Button

Default button:
<pre><code>(button)</code></pre>

Button type:
        (button:BUTTON_TYPE)
BUTTON_TYPE corresponds to valid HTML `<button type="BUTTON_TYPE">` types.

### Title

<pre><code>TITLE
+++++++++++++++++</code></pre>

------------------
Version March 15, 2013
