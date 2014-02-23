# Blurred Logos
Use imagemagick command line to achieve the photoshop gaussian blur

convert imageName.jpg -blur (blurVal*2)xblurVal fileoutName.jpg

Example:
convert mcdonalds.jpg -blur 60x30 30.png 30pixel gaussian blur photoshop
convert mcdonalds.jpg -blur 80x40 40.png 40pixel gaussian blur photoshop