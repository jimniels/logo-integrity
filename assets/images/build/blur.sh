#!/bin/bash

# copy originals over to source and append '-0' to filename
for i in *.png; do cp "$i" "../src/${i%.png}-0.png"; done

# do a blur on each one
convert *.png -set filename:f '%t' -blur 20x10 '../src/%[filename:f]-10.jpg'
convert *.png -set filename:f '%t' -blur 40x20 '../src/%[filename:f]-20.jpg'
convert *.png -set filename:f '%t' -blur 60x30 '../src/%[filename:f]-30.jpg'
convert *.png -set filename:f '%t' -blur 80x40 '../src/%[filename:f]-40.jpg'
convert *.png -set filename:f '%t' -blur 100x50 '../src/%[filename:f]-50.jpg'