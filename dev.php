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
            <a href="#" class="filter-control sharpen">&laquo; Sharpen</a>
            <ul class="filter-scale">
                <li><a href="#">0</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">20</a></li>
                <li><a href="#">30</a></li>
                <li><a href="#">40</a></li>
                <li><a href="#" class="active">50</a></li>
            </ul>
            <a href="#" class="filter-control blur disable">Blur &raquo;</a>
            <a href="#" class="shuffle" title="Shuffle">Shuffle</a>
        </div>

        <ul class="brands brands--blur50">
            <?php
                function stringAdjust($string) {
                    //Lower case everything
                    $string = strtolower($string);
                    //Make alphanumeric (removes all other characters)
                    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
                    //Clean up multiple dashes or whitespaces
                    $string = preg_replace("/[\s-]+/", " ", $string);
                    //Convert whitespaces and underscore to dash
                    $string = preg_replace("/[\s_]/", "-", $string);
                    return $string;
                }
                $logos = array(
                    "ABC",
                    "Apple",
                    "CBS",
                    "CNN",
                    "Coke",
                    "Dropbox",
                    "ESPN",
                    "General Electric",
                    "Google",
                    "Honda",
                    "Hyundai",
                    "IBM",
                    "Intel",
                    "John Deere",
                    "Jumpman",
                    "Mazda",
                    "McDonalds",
                    "Mercedes",
                    "MTV",
                    "Nike",
                    "Shell",
                    "Starbucks",
                    "Taco Bell",
                    "Target",
                    "Toyota",
                    "Twitter",
                    "Univision",
                    "UPS",
                    "Visa",
                    "Volkswagen"
                );
                foreach ($logos as $key) {
                    ?>
                        <li class="brand" id="<?php echo stringAdjust($key) ?>">
                            <h2 class="brand-name"><?php echo $key ?></h2>
                            <ul class="logos">
                                <?php for ($i=0; $i <= 5; $i++) { ?>
                                    <li class="logo logo--blur<?php echo $i*10 ?>">
                                        <a href="assets/images/build/<?php echo stringAdjust($key).'-'.$i*10 ?>.png">
                                            <?php echo $i*10 ?>px blur
                                        </a>
                                    </li>   
                                <?php } ?>
                            </ul>
                    <?php
                }

            ?>
            
        </ul>

    </section>

    <footer>
        <p>Created by <a href="http://jim-nielsen.com/">Jim Nielsen</a>. Got feedback? Tweet me <a href="http://twitter.com/jimniels/">@jimniels</a>.</p>
        <p>View source on <a href="https://github.com/jimniels/logos">Github</a>.</p>
    </footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="assets/scripts/scripts.js"></script>

</body>
</html>