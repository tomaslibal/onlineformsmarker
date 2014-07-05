## Parsing the syntax

### Introduction

I started by thinking about a usable syntax for quickly writing a manifest of
a form. No HTML, stricly just the structure and the data such as the labels, 
names of the elements etc.

````
(button Click Me!)
````

The above will render a button with a caption "Click Me!". The visual layer is
completely separated. If you want to add an attribute, just expand the button's
definiton to:

````
(button :submit Click Me!)
````

### Finite State Machine

In an article on Tumblr, [I posted](http://foundryof01.tumblr.com/post/90847847098/updated-finite-state-automaton-for-a-online-forms) about a Finite State Automaton which I have been experimenting with and whose implementation is more-or-less embedded in the current release of the Onlineformsmarker. 

![screenshot of OFM 1](http://38.media.tumblr.com/cea229e9751889803405d8fbdcdc7c87/tumblr_n88rj74BFx1sj6br7o1_r1_1280.png "Screenshot from the JFLAP program")
Figure 1: Screenshot from the JFLAP program

A draft version of the automaton is included in this folder in the `ofm_fa.jff` file.

#### Alphabet set

In the automaton the are 3 sets which altogether form the alphabet of this automaton:

- a = { characters (like a,b,c,ø,ñ, etc.) and numbers }
- b = { punctation marks (like comma, semicolon etc.) }
- c = { space, tab } (whitespace)

#### Tests

It is easy to run a multiple input test in the JFLAP program with the selected 
automaton. This helps to test if the automaton accepts and rejects the inputs 
as expected. Here are a few examples using [the syntax](/tree/master/syntax.md)
 and a few non-OFM syntax sentences.

|       Input              |       Expected        |      Actual       |
|:-------------------------|:----------------------|:------------------|
| (input)                  | Accept                | Accept            |
| (input and some label)   | Accept                | Accept            |
| (input @@given value@@)  | Accept                | Accept            |
| (input #myid with an id) | Accept                | Accept            |
| (---)                    | Reject                | Reject            |
| (input :number year)     | Accept                | Accept            |
|                          | Reject                | Reject            |
| just some text           | Reject                | Reject            |
| ()                       | Accept                | Accept            |

