#!/bin/bash

for filename in *.png; do
    mv "$filename" "${filename/jpg_/}"
done