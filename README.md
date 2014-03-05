# Blurred Logos
Use imagemagick command line to achieve the photoshop gaussian blur

convert imageName.jpg -blur (blurVal*2)xblurVal fileoutName.jpg

Example:
- 30 pixel gaussian blur
    - `convert *.png -set filename:f '%t' -blur 60x30 '../src/%[filename:f]-30.jpg'`
- 40 pixel gaussian blur
    - `convert * -set filename:f '%t' -blur 80x40 '%[filename:f]-40.jpg'`
- Combine into single image
    - `convert *-50.jpg -append 50.jpg`