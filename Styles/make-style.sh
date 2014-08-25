#!/bin/bash

source_path=$1/Src/style.scss
output_path=$1/style.css

# check that the file exists
if [ -f $source_path ]; then
    sass $source_path:$output_path
else
    echo "No such style"
fi;