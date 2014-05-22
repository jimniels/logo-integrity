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

Feedback:
- Swap out a few brands, some car ones (mazda?) bring back CNN
- Figure out the scoring/point system +5, +4, +3, +2, +1

## To-Do

### 1.0
- Image for facebook share
- Favicon
- Title of the thing? <title> tag at least
- Accompanying blog post
- iOS get input to show next to keyboard
- Share link text
- Test in IE8 (make images work as svg fallbacks)

### Would be nice
- 'Reset' game rather than reload