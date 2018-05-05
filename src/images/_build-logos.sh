# #!/bin/bash

# # Convert each SVG file to a single JPG with each blur we need
echo "=> Building individual JPGs ..."
for filename in *.svg; do

    # Get the file basename
    basename="$(basename "$filename" .svg)"

    # Convert SVG to PNG
    convert "$basename.svg" "$basename.png"

    # Make blur versions of PNG
    convert "$basename.png" -blur 40x20 "$basename-20.jpg"  # 20px blur
    convert "$basename.png" -blur 30x15 "$basename-15.jpg"  # 15px blur
    convert "$basename.png" -blur 20x10 "$basename-10.jpg"  # 10px blur
    convert "$basename.png" -blur 10x05 "$basename-05.jpg"  # 5px blur
    mv "$basename.png" "$basename-0.png"                    # 0px

    # Convert various blurred versions to single JPG
    convert "$basename"-* -append "$basename.jpg"

    # Remove old single versions
    rm "$basename"-*
done

# Optimize the JPG and SVG images (open -a ImageOptim *.jpg)
echo "=> Optimizing SVGs ..."
svgo -f .

echo "=> Optimizing JPGs ..."
/Applications/ImageOptim.app/Contents/MacOS/ImageOptim *.jpg


# Move all files to build directories
echo "=> Moving files ..."
mv *.jpg ../build/logos/jpgs
mv *.svg ../build/logos/svgs

echo "=> Done!"