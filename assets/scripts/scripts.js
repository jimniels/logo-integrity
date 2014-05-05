$(document).ready(function(){
    
    //
    //
    //  Initialize
    //  -----

    // Setup jQuery variables
    var $points = $('.points'),
        $container = $('.container');

    // Set the active blur value on page load
    $container.attr('data-active-blur-value', 20);
    

    // Set blur varlue variables 
    // note that the active blur value (20, 15, 10, 5) also serves as the point value
    var blurValueActive = eval($container.attr('data-active-blur-value')),
        blurValueIncrement = 5;

    
    // Append form, set each 'answered' as false
    var numberOfBrands = 0;
    $('.brand').each(function(){
        var formHtml = '\
            <form class="form">\
                <input type="text" tabindex="'+numberOfBrands+'"/>\
                <label>Guess the brand:</label>\
                <button type="submit">Guess</button>\
            </form>\
        ';
        $(formHtml).appendTo(this);
        $(this).attr('data-answered', 'false');  
        numberOfBrands++;
    })
    $('.points-label').text('/'+numberOfBrands);

    //
    //
    //  Brand Clicks
    //  -----
    //  inputFocused is a toggle for keeping track of 
    //  whether the input is in focus
    var inputFocused = false;

    $('.brand').on('mousedown', function(){
        $input = $(this).find('input');
        if($input.is(':focus')) {
            inputFocused = true;
        } else {
            inputFocused = false;
        }
    }).on('click', function(e){
        var $this = $(this);

        // If this question is unanswered
        if( $this.attr('data-answered') == 'false' ) {
            var $input = $this.find('input');
            
            if(!inputFocused) {
                $input.focus();
            }
        }
    });

    //
    // Form / Input clicks
    //
    $('form').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
    });


    //
    //
    //  Button Clicks
    //  -----
    //
    $('button').on('mousedown click', function(e){
        e.preventDefault();
        e.stopPropagation();

        console.log('fired button click');
        
        var $this = $(this),
            $brand = $this.parents('.brand');

        // evaluate the value here
        var $input = $this.siblings('input');
        var userAnswer = $input.val();
        var answer = $brand.attr('data-answer');
        answer = eval(answer);


        var f = FuzzySet(answer);
        var fuzzy = f.get(userAnswer);

        if(fuzzy && fuzzy[0][0] > .6666666) {
            console.log("You're right! " + fuzzy[0][0]);
            $brand.addClass('correct');
            $this.attr('disabled', 'disabled').text('+' + blurValueActive);
            
            // increase the points
            var currentPoints = parseInt($points.text());
            var i = currentPoints;

            $points.toggleClass('points-increase');
            
            //setTimeout(function(){
                var counter = setInterval(function(){
                    i++;
                    $points.html(i);
                    console.log('count up');
                    if(i == currentPoints + blurValueActive){
                       clearInterval(counter); 
                       $points.toggleClass('points-increase');
                    }
                }, 500/blurValueActive); // half a second
            //}, 166); // duraction of animation


        } else {            
            $brand.addClass('incorrect');
            $this.attr('disabled', 'disabled').text('0');
        }
        
        // disable inputs
        $brand.find('input').attr('disabled', 'disabled');
        $brand.removeClass('focused');
        
        // show the div
        $brand.attr('data-answered', true);
    });


    

    //
    //
    //  Sharpen
    //
    $('.sharpen a').on('click', function(e){
        e.preventDefault();
        $this = $(this);

        if(blurValueActive > 0) {
            // Reset all the brands and form attributes
            $('.brand.incorrect').each(function(){
                $this = $(this);
                $this.removeClass('reveal incorrect');
                $this.attr('data-answered', 'false');
                $this.find('input').attr('disabled', false).val('');
                $this.find('button').attr('disabled', false).text('Reveal');
            });

            // Change the active blur value to whatever was clicked
            $('.brands').toggleClass('shuffling');

            setTimeout(function(){
                
                // Set the active blur value
                $('.container').attr('data-active-blur-value', blurValueActive - blurValueIncrement);

                setTimeout(function(){
                    $('.brands').toggleClass('shuffling');

                    // Update set the active blur value variable
                    blurValueActive -= blurValueIncrement;

                    if(blurValueActive == 0) {
                        $this.text("Doesn't get any easier");
                        $this.css('background-color', '#ccc').css('color', '#000');  
                    }
                }, 300)
            }, 300);
        }
    });



});



//
//  Shuffle plugin
//  Used to shuffle <li> elements in a list
//  http://css-tricks.com/snippets/jquery/shuffle-dom-elements/
// 
//  Usage
//  $('.target-ul li').shuffle()
//
(function($){
 
    $.fn.shuffle = function() {

        var allElems = this.get(),
            getRandom = function(max) {
                return Math.floor(Math.random() * max);
            },
            shuffled = $.map(allElems, function(){
                var random = getRandom(allElems.length),
                    randEl = $(allElems[random]).clone(true)[0];
                allElems.splice(random, 1);
                return randEl;
           });
 
        this.each(function(i){
            $(this).replaceWith($(shuffled[i]));
        });
 
        return $(shuffled);
 
    };
 
})(jQuery);
