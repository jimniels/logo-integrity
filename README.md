# Blurred Logos
Use imagemagick command line to achieve the photoshop gaussian blur

Example:
- 30 pixel gaussian blur
    - `convert *.png -set filename:f '%t' -blur 60x30 '../src/%[filename:f]-30.jpg'`
- 40 pixel gaussian blur
    - `convert * -set filename:f '%t' -blur 80x40 '%[filename:f]-40.jpg'`
- Combine into single image
    - `convert *-50.jpg -append 50.jpg`


## To-Do

### 1.0
- Title of the thing? <title> tag at least
- iOS get input to show next to keyboard
- Test in IE8 (make images work as svg fallbacks)
- Make sure analytics are in
- "Slide down" success screen on iOS


### Would be nice
- 'Reset' game rather than reload

## Before Pushing
- Make sure shuffle is on
- Make sure clicking the points doesnt end the game
- Remove console.log
- Publish Blog Post