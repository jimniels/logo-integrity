$(document).ready(function(){
    
    // Shuffle the logos on page load
    //$('.brands li').shuffle(); 
    var $points = $('.points-count');

    var logos = $('.logos > li');
    var formHtml = '\
        <form class="form">\
            <label>Guess the brand:</label>\
            <input type="text" />\
            <button type="submit">Reveal</button>\
        </form>\
    ';

    // Append form, set each 'answered' as false
    var numberOfBrands = 0;
    $('.brand').each(function(){
        $(formHtml).appendTo(this);
        $(this).attr('data-answered', 'false');  
        numberOfBrands++;
    })
    $('.points-label').text('/'+numberOfBrands);

    // Brand
    $('.brand').on('click', function(e){

        var $this = $(this);

        // If this question is unanswered
        if( $this.attr('data-answered') == 'false' ) {
            $this.toggleClass('reveal');

            // If it's visible, focus the input
            if($this.hasClass('reveal')) {
                setTimeout(function(){
                    $this.find('input').focus();
                }, 500);
            }
        }
        // Otherwise Do nothing
        else {
            console.log('Already answered!');
        }
    });

    $('input').on('click', function(e){
        e.stopPropagation();
    });

    $('button').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        
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
            $this.attr('disabled', 'disabled').text('+1');
            
            // increase the points
            var currentPoints = $points.text();
            currentPoints = parseInt(currentPoints);
            $points.text(currentPoints+1);
            $points.parent().toggleClass('points-increase');
            setTimeout(function(){
                $points.parent().toggleClass('points-increase');
            }, 600); //matches the css transition duration
        } else {
            console.log("Not close enough!");
            if(fuzzy) {console.log(fuzzy[0][0]);}
            $brand.addClass('incorrect');
            $this.attr('disabled', 'disabled').text('0');
        }
        
        // disable inputs
        $brand.find('input').attr('disabled', 'disabled');
        
        // show the div
        $brand.attr('data-answered', true);
    });




    // Filters
    $('.filter-point').on('click', function(e){
        e.preventDefault();
        $this = $(this);
        
        // Reset all the brands and form attributes
        $('.brand').each(function(){
            $brand = $(this);
            $brand.removeClass('reveal correct incorrect');
            $brand.attr('data-answered', 'false');
            $brand.find('input').attr('disabled', false).val('');
            $brand.find('button').attr('disabled', false).text('Reveal');
        });

        // Change the active blur value to whatever was clicked
        $('.brands').toggleClass('shuffling');

        setTimeout(function(){
            $('.container').attr('data-active-blur-value', $this.attr('data-blur-value'));
            $('.brands li').shuffle();

            setTimeout(function(){
                $('.brands').toggleClass('shuffling');
                
                // reset points
                $points.text('0');
            }, 300)
        }, 300);
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
