<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Logos Test</title>
    

    <!-- CSS
    =================================== -->
    <link rel="stylesheet" href="assets/css/build/styles.css">

    <!-- Scripts
    =================================== 
    <script src="js/modernizr.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header class="header">
        <h1 class="h1" id="h1">Bringing Logos into Focus</h1>
        <blockquote>
            <p>
                <span>“</span>How far out of focus can an image be and still be recognized? A [logo] which is subject to an infinite number of uses, abuses, and variations whether for competitive purposes or for reasons of ‘self-expression,’ cannot survive unless it is designed with utmost simplicity and restraint.”
                <br />— Paul Rand, <em>A Designer’s Art</em>.
            </p>
        </blockquote>
        <p><a href="#">Read more about this experiment &raquo;</a></p>
        <p>How many logos can you identify with a 50 pixel gaussian blur? What about a 40 pixel blur? 30 pixel blur? 20? 10?</p>
    </header>
    
    <section>
        <div class="filter">
            <h3 class="filter-label">Blur radius (px):</h3>
            <ul class="filter-controls">
                <li><a href="#">0</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">20</a></li>
                <li><a href="#">30</a></li>
                <li><a href="#">40</a></li>
                <li><a href="#" class="active">50</a></li>
            </ul>
        </div>
        <ul class="logos logos--blur50">
            <?php
                function stringAdjust($string) {
                    $string = strtolower($string);
                    $string = preg_replace("/[\s_]/", "-", $string);
                    return $string;
                }
                $logos = array(
                    "abc",
                    "apple",
                    "cbs",
                    "cnn",
                    "coke",
                    "dropbox",
                    "espn",
                    "general-electric",
                    "google",
                    "honda",
                    "hyundai",
                    "ibm",
                    "intel",
                    "john-deere",
                    "jumpman",
                    "mazda",
                    "mcdonalds",
                    "mercedes",
                    "mtv",
                    "nike",
                    "shell",
                    "starbucks",
                    "taco-bell",
                    "target",
                    "toyota",
                    "twitter",
                    "univision",
                    "ups",
                    "visa",
                    "volkswagen"
                );
                foreach ($logos as $key) {
                    ?>
                        <li class="<?php echo stringAdjust($key) ?>">
                            <h2><?php echo $key ?></h2>
                            <ul class="logo logo--<?php echo stringAdjust($key) ?>">
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
<script type="text/javascript" src="assets/scripts/scripts.js"></script>

</body>
</html>