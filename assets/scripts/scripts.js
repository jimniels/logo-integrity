//
//  Fuzzy String Matching
//  http://glench.github.io/fuzzyset.js/
//
//  @guess - string to search for
//  @answer - array of possible correct matches
//  Return a number from 0 to 1 rating the approximation of the guess
//
function fuzzyStringMatch(guess, answer) {
    var f = FuzzySet(answer),
        fuzzy = f.get(guess);

    if(fuzzy) {
        return fuzzy[0][0];
    } else {
        return 0;
    }
};

//
//
//  Game Object
//  ====================
//  Blur values 
//  @blurCurrent is the value of the svg blur (20, 15, 10, 5)
//  @blurIncrement is the increments the blur comes in
//  @scoreCurrent is the two added together
//
var Game = {
    $scoreCurrent: $('.score-current'),
    score: 0,
    $brands: [],
    blurCurrent: 20,
    blurIncrement: 5,
    scoreCurrent: function(){
        return this.blurCurrent + this.blurIncrement;
    },

    init: function(){
        
        // Set the active blur value on page load
        $('.container').attr('data-active-blur-value', this.blurCurrent);

        // Shuffle the logos then set $brands
        $('.brand').shuffle();
        this.$brands = $('.brand');

        // Appdend form template to each brand
        var tabindex = 1;
        formHtml = $('#template-brand-form').html();
        this.$brands.each(function(){
            console.log('append form');
            $(formHtml).appendTo(this).find('input').attr('tabindex', tabindex);
            $(this).attr('data-answered', 'false');  
            tabindex++;
        });

        // Append share modal
        $( $('#template-share-modal').html() ).appendTo('body');
    },


    end: function() {

        // Generate share links with point values
        var twitter = 'http://twitter.com/home?status=I scored '+this.score+' points trying to identify logos. Think you can beat me? Try it: '+location.href,
            facebook = 'http://www.facebook.com/share.php?u='+location.href;
        $('.icon-twitter').attr('href', twitter);
        $('.icon-facebook').attr('href', facebook);
        $('.icon-play-again').attr('href', location.href);

        // Animate share on screen
        $('body').addClass('share-modal-enabled');
        this.animateScore( 
            $('.score-final'),                      // element to animate
            0,                                      // start
            parseInt(this.$scoreCurrent.html()),    // stop
            (1500 / this.score),                    // timing
            function(){}                            // callback
        );
    },

    //
    //
    //  Animate Score
    //  Generic function that counts up a number on screen
    //
    //  @$el - jquery object of DOM element we're animating
    //  @start - Value we start counting at
    //  @end - Value we stop counting at
    //  @timing - how long to execute each interval
    //
    animateScore: function($el, start, stop, timing, callback) {
        var c = setInterval(function(){
            $el.html(start);
            if(start == stop ){
                clearInterval(c);
                $el.html(stop);
                callback(); 
            } else {
                start++;
            }
        }, timing ); // half a second?
    },

    //
    //
    //  Evaluate an answer
    //  
    //  @brand - jQuery object of the brand being guessed at
    //
    evaluateAnswer: function($brand) {
        
        // Variables
        var guess = $brand.find('input').val(),
            answer = eval( $brand.attr('data-answer') ),
            grade = fuzzyStringMatch(guess, answer);

        console.log('Grade:'+ Math.round(grade*100)/1 +'%; Guess:'+guess+'; Answer:'+answer );

        if(grade > .6666666) {
            
            // Mark as correct
            $brand.addClass('correct');

            // Denote points received on screen
            $brand.find('button').html('+' + this.scoreCurrent());
            
            // Animate the increase
            var oldScore = this.score;
            var newScore = this.score + this.scoreCurrent();
            var self = this;
            this.$scoreCurrent.toggleClass('score-increase');
            this.animateScore( 
                this.$scoreCurrent,         // element to animate
                oldScore,                   // start
                newScore,                   // stop
                (500 / this.scoreCurrent()), // half a second timing
                function() {
                    self.$scoreCurrent.toggleClass('score-increase');
            });

            // Inscrease overall Game score
            this.score += this.scoreCurrent();          

        } else {

            // Mark as incorrect
            $brand.addClass('incorrect');

            // Denote points received as 0
            $brand.find('button').html('0');
        }

        // Disable button & input
        $brand.find('button').attr('disabled', 'disabled');
        $brand.find('input').attr('disabled', 'disabled');
        $brand.removeClass('focused');
        
        // Show the div
        $brand.attr('data-answered', true);

        // If there are no more brands to guess because they've all been answered
        if ( this.$brands.filter('[data-answered="false"]').size() == 0 ) {
            
            // If the current blur is not 0 AND there are incorrect guesses still remaining
            // Go to next level by sharpening the logos
            // Otherwise, end the game
            if(this.blurCurrent != 0 && this.$brands.filter('.incorrect').size() > 0) {
                this.sharpenLogos( $('.sharpen a') );
            } 
            else {
                game = this;
                setTimeout(function(){
                    game.end();
                }, 1000);
            }
        }

    },

    // startOver: function() {
    //     this.$brands.each(function(){
    //         $this = $(this);
    //         $this.removeClass('reveal incorrect correct').attr('data-answered', 'false');
    //         $this.find('input').attr('disabled', false).val('');
    //         $this.find('button').attr('disabled', false).text('Reveal');
    //     });
        
    //     // Reset points
    //     this.score = 0;
        
    //     // Reset on screen scores
    //     this.$scoreCurrent.html('0');
    //     this.$scoreFinal.html('0');

    //     // Reset blur
    //     this.blurCurrent();
    //     this.SetBlurCurrent();
    // },

    resetLogos: function($brands) {
        $brands.each(function(){
            $this = $(this);
            $this.removeClass('reveal incorrect').attr('data-answered', 'false');
            $this.find('input').attr('disabled', false).val('');
            $this.find('button').attr('disabled', false).text('Reveal');
        });
    },

    sharpenLogos: function($this) {

        if(this.blurCurrent > 0) {

            // Reduce current blur value
            this.blurCurrent -= this.blurIncrement;
            console.log('current blur value'+ this.blurCurrent);
            
            // Reset the brands that have been answered incorrectly
            this.resetLogos( $('.brand.incorrect') );
            
            // Sharpen the logos
            $('.brands').toggleClass('shuffling');
            game = this;            
            setTimeout(function(){
                
                // Set the active blur value
                $('.container').attr('data-active-blur-value', game.blurCurrent);

                setTimeout(function(){
                    $('.brands').toggleClass('shuffling');

                    // Update set the active blur value variable
                    //game.blurCurrent -= game.blurIncrement;

                    if(game.blurCurrent == 0) {
                        console.log($this);
                        $this.text("Doesn't get any easier");
                        $this.css('background-color', '#ccc').css('color', '#000');  
                    }
                }, 300)
            }, 300);
        }
    }
};

// Set user agent
var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);

// On ready
$(document).ready(function(){


    //
    //
    //  Initialize the Game
    //  -----
    //
    Game.init();

    //
    //
    //  End the Game
    //  -----
    //
    $('.score-current').on('click', function(){
        Game.end();
    });

    //
    //
    //  Brand Clicks
    //  -----
    //  inputFocused is a toggle for keeping track of 
    //  whether the input is in focus
    //
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
    //  Form clicks
    //  -----
    //
    $('form').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
    }).on('submit', function(){
        // Game.evaluateAnswer( $(this).parents('.brand') );
        // console.log('fired submit');
        Game.evaluateAnswer( $(this).parents('.brand') );
        return false;
    });


    //
    //
    //  Make a Guess Button
    //  -----
    //  Make sure you do the same thing on form submit for IE8 enter issue
    $('button').on('mousedown click', function(e){
        e.preventDefault();
        e.stopPropagation();
        Game.evaluateAnswer( $(this).parents('.brand') );
    });
    
    //
    //
    //  Sharpen Logos Button
    //  -----
    //
    $('.sharpen a').on('click', function(e){
        e.preventDefault();
        Game.sharpenLogos( $(this) );
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