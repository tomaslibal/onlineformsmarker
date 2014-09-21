# Onlineformsmarker

Onlineformsmarker (or OFM) is a simple rendering software for a custom form
markup syntax. It takes input in textual form (the form markup information) and
renders a HTML output.

The main driver for the development of this package was to simplify the creation
of HTML forms. With `onlineformsmarker` you can define the logical structure
of the form separately from the HTML code.

The syntax is a regular language and therefore does not support nested
structures. There's a [simple documentation](Docs/README.md) that explains
the grammar and other characteristics of the language itself.

## Example

![Image showing an example of OnlineFormsMarker](http://libal.eu/imghost/ofm-example-01.jpg "Example of OnlineFormsMarker")
<br>Input-as-text example demonstrating the basic syntax and use
<br>Result in a web browser running on a local server (some CSS was used)

## Usage

Example usage:

```php
<?php
require_once '/path/to/onlineformsmarker/App/FormFactory.php';
$string = "(title My test form)
(input:password your password please)
(button click me)";
echo \OFM\App\FormFactory::quick($string);
?>
```


## Syntax

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

### Getting new Form object using FormFactory

You can request a new instance of Form using the FormFactory static methods `\OFM\App\FormFactory::create()` and `\OFM\App\FormFactory::quick($string)`.

## Test

To run the test suite you will need the dependencies from the requirements (see
the next section). The suite is written in PHP and can be executed in a command
  line environment or through a web server. With cli you can do:

    cd /path/to/onlineformsmarker/Test
    php test.php

This should output the result of the tests.

## Roadmap

- 0.3: basic unicode support
- 0.4: online rendering demo (add styles, copy/paste buttons), improved docs
- 0.5: test coverage report (possibly a PHPUnit framework)

## Requirements

- PHP 5 >= 5.3.0 (This is for the `namespace`)
- enabled multibyte string library `mbstring` (non-default extension) and `--enable-mbstring` configuration

------------------
Versions:
- May 11, 2014 v0.2-pre
- May 22, 2013 v0.1-legacy

Upcoming:
- v0.3 will feature basic unicode support and general improvements (such as the FormFactory class)
