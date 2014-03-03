#!/bin/bash

# Old Way
# for i in *.png; do cp "$i" "../src/${i%.png}-0.png"; done
# convert *.png -set filename:f '%t' -blur 20x10 '../src/%[filename:f]-10.jpg'

# New Way
for filename in *.png; do
    basename="$(basename "$filename" .png)"
    path="../src/"
    cp "$basename.png" "$path$basename-0.png"
    convert "$basename.png" -blur 20x10 "$path$basename-10.jpg"  # 10px blur
    convert "$basename.png" -blur 40x20 "$path$basename-20.jpg"  # 20px blur
    convert "$basename.png" -blur 60x30 "$path$basename-30.jpg"  # 30px blur
    convert "$basename.png" -blur 80x40 "$path$basename-40.jpg"  # 40px blur
    convert "$basename.png" -blur 100x50 "$path$basename-50.jpg" # 50px blur
done