$(document).ready(function(){
    
    //$('body').addClass('js');

    var logos = $('.logos > li');

    $('.brand').on('click', function(){
        $(this).toggleClass('reveal');
    });

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
