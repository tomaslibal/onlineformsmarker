OnlineFormsMarker
=================

This is a simple rendering app for a custom form markup syntax. It takes input in textual form (the form markup syntax) and renders a HTML output.

Example
-------------

![Image showing an example of OnlineFormsMarker](http://libal.eu/imghost/ofm-example-01.jpg "Example of OnlineFormsMarker")
<br>Input-as-text example demonstrating the basic syntax and use
<br>Result in a web browser running on a local server (some CSS was used)

Syntax
------

### Input

Default input with a label:
```
(input label of the input)
```

Specifying the input's type:

```
(input :INPUT_TYPE)
```

INPUT_TYPE corresponds to the HTML valid `<input type="INPUT_TYPE">` types.

Specifying the input's ID:

```
(input #INPUT_ID)
```

Predefined value of an input:

```
(input @@Value can be specified@@ Your name)
```

Value can be any text.

### Textarea

Default (empty) textarea:
```
(textarea)
```

Content of the textarea:
```
(textarea @@CONTENT HERE@@)
```

Caption of the textarea:

```
(textarea LABEL_HERE)
```

### Button

Default button:
```
(button)
```

Button type:

```
(button :BUTTON_TYPE)
```

BUTTON_TYPE corresponds to valid HTML `<button type="BUTTON_TYPE">` types.

### Selectbox

Default:
```
(selectbox)
```

Specifying the options of the selectbox:

```
(selectbox [opt1=val1] [opt2=val2]...[optN=valN])
```

### Title

```
(title Title of several words)
```

Title is specified in a bracket-notation as well with the keyword "title" followed by text.

Form class
----------

The class is located at onlineformsmarker/App/Form.php

### Public properties

* action `$form->action`
* method `$form->method`
* enctype `$form->enctype`
* name `$form->name` (note that not all DOCTYPES support this attribute)
* id `$form->id`

------------------
Versions:
- May 11, 2014 v0.2-pre
- May 22, 2013 v0.1-legacy
