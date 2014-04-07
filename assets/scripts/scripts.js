$(document).ready(function(){
    
    // Shuffle the logos on page load
    //$('.brands li').shuffle(); 

    var logos = $('.logos > li');
    var formHtml = '\
        <form class="form">\
            <label>Brand name:</label>\
            <input type="text" />\
            <button type="submit">Show Me</button>\
        </form>\
    ';

    // Append form, set each 'answered' as false
    $('.brand').each(function(){
        $(formHtml).appendTo(this);
        $(this).attr('data-answered', 'false');   
    })

    // Brand
    $('body').on('click', '.brand', function(e){

        var $this = $(this);

        // find any other .reveal and remove
        // $('.reveal[data-answered="false"]').each(function(){
        //    $(this).removeClass('reveal'); 
        // });

        // If this question is unanswered
        if( $this.attr('data-answered') == 'false' ) {
            $this.toggleClass('reveal');

            // If it's visible, focus the input
            if($this.hasClass('reveal')) {
                setTimeout(function(){
                    $this.find('input').focus();
                }, 100);
            }
        }
        // Otherwise Do nothing
        else {
            
            console.log('Already answered!');
        }
    });

    $('body').on('click', 'input', function(e){
        e.stopPropagation();
    });

    $('body').on('click', 'button', function(e){
        e.preventDefault();
        e.stopPropagation();
        
        var $this = $(this),
            $brand = $this.parents('.brand');

        // evaluate the value here
        var input = $this.siblings('input').val();
        var answer = $brand.attr('data-answer');
        answer = eval(answer);

        
        var f = FuzzySet(answer);
        var fuzzy = f.get(input);

        if(fuzzy) {
            if(fuzzy[0][0] < .6666666) {
                console.log("Not close enough! " + fuzzy[0][0]);
            }
            else {
                console.log("You're right! " + fuzzy[0][0]);
            }
        } else {
            console.log("Not even close!");
        }
        

        // show the div
        $brand.attr('data-answered', true);
    });




    // Filters
    $('.filter-point').on('click', function(e){
        e.preventDefault();
        
        // Any 'revealed' logos should go blurred on change
        $('.reveal').each(function(){
            $(this).removeClass('reveal');
        });

        // Change the active blur value to whatever was clicked
        $('.container').attr('data-active-blur-value', $(this).attr('data-blur-value'));
    });

    $('.filter-shuffle').on('click', function(){
        $('.brands li').shuffle(); 
    });


    var elWrap = $(".wrap");
    var elMenu = $(".menu");
    var osMenu = elMenu.offset().top;
    

    $(window).scroll($.throttle(10, function() {
        console.log('fireing');
        elMenu.css("top", 0);
        var edge = $(window).scrollTop();

        if (osMenu <= edge) {
            elWrap.addClass("dock").removeClass("stop");
        }
        else {
            elWrap.removeClass("dock stop");
        }

    }));



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
