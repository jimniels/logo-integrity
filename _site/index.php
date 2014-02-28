<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Logos Test</title>
    

    <!-- CSS
    =================================== -->
    <link rel="stylesheet" href="assets/css/src/styles.css">

    <!-- Scripts
    =================================== 
    <script src="js/modernizr.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <header class="header">
        <h1 class="h1" id="h1">Logos Test</h1>
        
        <div class="controls">
            <h3 class="label">Blur radius (px):</h3>
            <ul class="tabs">
                <li><a href="#">0</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">20</a></li>
                <li><a href="#">30</a></li>
                <li><a href="#">40</a></li>
                <li><a href="#" class="active">50</a></li>
            </ul>
        </div>
    </header>
    
    <section>

        <ul class="logos logos--blur50">
            <?php
                $logos = array(
                    "McDonalds",
                    "Apple",
                    "Coke",
                    "Dropbox",
                    "Google",
                    "IBM",
                    "Mercedes",
                    "Nike",
                    "Shell",
                    "Volkswagen",
                    "Toyota",
                    "UPS",
                    "Visa",
                    "Starbucks"
                );
                foreach ($logos as $key) {
                    ?>
                        <li>
                            <h2><?php echo $key ?></h2>
                            <ul class="logo logo--<?php echo strtolower($key) ?>">
                                <li class="blur50"></li>
                                <li class="blur40"></li>
                                <li class="blur30"></li>
                                <li class="blur20"></li>
                                <li class="blur10"></li>
                                <li class="blur0"></li>
                            </ul>
                    <?php
                }

            ?>
            
        </ul>

    </section>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">



    var logos = document.querySelectorAll('.logo li');
    for (var i = 0; i < logos.length; i++) {
        logos[i].addEventListener('click', function(e){
            e.preventDefault();
            this.classList.toggle('hover');
        }, true);
    };

    if (!("ontouchstart" in document.documentElement)) {
        document.documentElement.className += " no-touch";
    }

    var tabs = document.querySelectorAll('.tabs a');
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener('click', function(e){
            e.preventDefault();

            var prevEl = document.querySelector('.active'),
                prevBlur = prevEl.innerText || prevEl.textContent,
                currentBlur = this.innerText || this.textContent,
                logos = document.querySelector('.logos');

            // Remove current .active class
            prevEl.classList.remove('active');
            
            // Add .active class to clicked el
            this.classList.toggle('active');

            // Add blur class to logos
            logos.classList.remove('logos--blur'+prevBlur);
            logos.classList.add('logos--blur'+currentBlur);
        }, true);
    };
    


    // http://stackoverflow.com/questions/7070054/javascript-shuffle-html-list-element-order
    var list = document.querySelector(".logos"),
        button = document.getElementById("h1");
        console.log(list);
    function shuffle(items)
    {
        var cached = items.slice(0), temp, i = cached.length, rand;
        while(--i)
        {
            rand = Math.floor(i * Math.random());
            temp = cached[rand];
            cached[rand] = cached[i];
            cached[i] = temp;
        }
        return cached;
    }
    function shuffleNodes()
    {
        var nodes = list.children, i = 0;
        nodes = Array.prototype.slice.call(nodes);
        nodes = shuffle(nodes);
        while(i < nodes.length)
        {
            list.appendChild(nodes[i]);
            ++i;
        }
    }
    button.onclick = shuffleNodes;

</script>

</body>
</html>