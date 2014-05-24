## Grammar of onlineformsmarker

### TOC

...

### Quick overview

Example of input

```
(input :type #id @@some value here@@ your name)
```

Set `A = {a, b, c, d, e}` is as follows:

- a space, semicolon, tab
- b newline feed
- c ascii text [35, 44..58, 64..91, 94..123]
- d open paren
- e close paren

Relation on A is defined as:

```
R = {(a, a), (a, b), (a, c), (a, d), (d, c), (d, e), (c, a), (c, c), (c, e), (e, b)}
```

#### Example of a token

```
(title Form Title)
```

Goes like 

```
(d, c) -> (c, c) -> (c, c) -> (c, c) -> (c, c) -> (c, a) -> (a, c) -> (c, c) -> (c, c) -> (c, a) -> (a, c) -> (c, c) -> (c, c) -> (c, c) -> (c, e)
``` 