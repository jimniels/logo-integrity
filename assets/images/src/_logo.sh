#!/bin/bash

for filename in *.png; do
    basename="$(basename "$filename" .png)"
    convert "$basename.png" -blur 20x10 "$basename-10.jpg"  # 10px blur
    convert "$basename.png" -blur 40x20 "$basename-20.jpg"  # 20px blur
    convert "$basename.png" -blur 60x30 "$basename-30.jpg"  # 30px blur
    convert "$basename.png" -blur 80x40 "$basename-40.jpg"  # 40px blur
    convert "$basename.png" -blur 100x50 "$basename-50.jpg" # 50px blur
    mv "$basename.png" "$basename-0.png"
    convert "$basename"* -append "$basename.jpg"
    rm "$basename"-*
done

# Optimize the images
# open -a ImageOptim *.jpg
/Applications/ImageOptim.app/Contents/MacOS/ImageOptim *.jpg