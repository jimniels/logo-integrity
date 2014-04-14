<?php include('brands.php'); ?><!DOCTYPE html>
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

    <section class="container wrap" data-active-blur-value="10">

        <div class="filters">
            <ul class="filter-range">
                <li><a href="#" class="filter-point" data-blur-value="0">Level 1</a></li>
                <li><a href="#" class="filter-point" data-blur-value="5">Level 2</a></li>
                <li><a href="#" class="filter-point" data-blur-value="10">Level 3</a></li>
                <li><a href="#" class="filter-point" data-blur-value="15">Level 4</a></li>
                <li><a href="#" class="filter-point" data-blur-value="20">Level 5</a></li>
            </ul>
            <div class="filter-points">
                <div class="points">
                    <span class="points-count">0</span> 
                    <span class="points-label">pts</span>
                </div>
                <a href="#" title="Share your score on Twitter">Tweet your score &raquo;</a>
            </div>
        </div>

        <ul class="brands">
            <?php
                function outputBrandNames($names){
                    
                    $string = '';

                    foreach ($names as $name) {
                        $string .= "'".$name."',";
                    }
                    
                    // cut off the last comma
                    $string = substr($string, 0, -1);

                    return $string;
                }
                $i = 0;
                foreach ($brands as $brandID => $brandNames) {
                    ?>
                        
                        <li class="brand" id="<?php echo $brandID ?>" data-answer="[<?php echo outputBrandNames($brandNames) ?>]">
                            <h2 class="brand-name">
                                <a href="assets/images/build/logos/jpgs/<?php echo $brandID ?>.jpg"><?php echo $brandNames[0] ?></a>
                            </h2>
                            <div class="logo"></div>
                        </li>
                    <?php
                }
            ?>
        </ul>

    </section>

    <footer>
        <p>Created by <a href="http://jim-nielsen.com/">Jim Nielsen</a>. Got feedback? Tweet me <a href="http://twitter.com/jimniels/">@jimniels</a>.</p>
        <p>View source on <a href="https://github.com/jimniels/logos">Github</a>.</p>
    </footer>

    <script type="text/javascript" src="assets/scripts/jquery.js"></script>
    <script type="text/javascript" src="assets/scripts/scripts.js"></script>
    <script type="text/javascript" src="assets/scripts/fuzzySet.js"></script>    


</body>
</html>