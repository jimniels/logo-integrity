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
    "Chase",
    "CNN",
    "Coke",
    "Dropbox",
    "ESPN",
    "General Electric",
    "Girl Scouts",
    "Honda",
    "Hyundai",
    "IBM",
    "Intel",
    "John Deere",
    "Jumpman",
    "KFC",
    "LG",
    "Mazda",
    "McDonalds",
    "Mercedes",
    "Mitsubishi",
    "MTV",
    "NBC",
    "Nike",
    "PBS",
    "Pepsi",
    "Puma",
    "Quicksilver",
    "Rolex",
    "Shell",
    "Starbucks",
    "Taco Bell",
    "Target",
    "Toyota",
    "Twitter",
    "Univision",
    "UPS",
    "Volkswagen"
);
?><!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>Logos Test</title>

    <!-- CSS
    =================================== -->
    <link rel="stylesheet" href="assets/css/build/styles.css">

    <!-- Scripts
    =================================== -->
    <script type="text/javascript" src="assets/scripts/modernizr.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>


.menu { height:50px; }
.main {}

/* account for "Menu" being removed from doc flow... */
.dock .main, .stop .main { padding-top:50px; }
/* when "Head" is out of view... */
.dock .menu { z-index:40; position:fixed; width: 100%;}
/* when "Main" is out of view... */
.stop .menu { z-index:40; position:absolute; }


    </style>
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
        <p>How many logos can you identify? Try sharpening the logos to make it easier.</p>
    </header>

    <section class="container wrap" data-active-blur-value="25">

        <div class="filters menu">
            <ul class="filter-range">
                <li><a href="#" class="filter-point" data-blur-value="0">Sharp</a></li>
                <li><a href="#" class="filter-point" data-blur-value="5">Hardly Blurry</a></li>
                <li><a href="#" class="filter-point" data-blur-value="10">Less Blurry</a></li>
                <li><a href="#" class="filter-point" data-blur-value="15">Blurry</a></li>
                <li><a href="#" class="filter-point" data-blur-value="20">Blurrier</a></li>
                <li><a href="#" class="filter-point" data-blur-value="25">Blurriest</a></li>
            </ul>
            <a href="#" class="filter-shuffle" title="Shuffle">Shuffle</a>
        </div>

        <ul class="brands main">
            <?php
                foreach ($logos as $key) {
                    ?>
                        <li class="brand" id="<?php echo stringAdjust($key) ?>">
                            <h2 class="brand-name">
                                <a href="assets/images/build/logos/jpgs/<?php echo stringAdjust($key) ?>.jpg"><?php echo $key ?></a>
                            </h2>
                            <div class="logo"></div>
                        </li>
                    <?php
                }
            ?>        </ul>

    </section>

    <footer>
        <p>Created by <a href="http://jim-nielsen.com/">Jim Nielsen</a>. Got feedback? Tweet me <a href="http://twitter.com/jimniels/">@jimniels</a>.</p>
        <p>View source on <a href="https://github.com/jimniels/logos">Github</a>.</p>
    </footer>

    <script type="text/javascript" src="assets/scripts/jquery.js"></script>
    <script type="text/javascript" src="assets/scripts/scripts.js"></script>

</body>
</html>