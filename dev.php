<?php include('brands.php'); ?><!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>Logos Test</title>

    <!-- CSS
    =================================== -->
    <link rel="stylesheet" href="assets/css/build/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    
    <!-- Scripts
    =================================== -->
    <script type="text/javascript" src="assets/scripts/modernizr.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body class="">
    
    <header class="header">
        <blockquote>
            <p>
                <span>“</span>How far out of focus can an image be and still be recognized? A [logo] which is subject to an infinite number of uses, abuses, and variations whether for competitive purposes or for reasons of ‘self-expression,’ cannot survive unless it is designed with utmost simplicity and restraint.”
                <br />— Paul Rand, <em>A Designer’s Art</em>.
            </p>
        </blockquote>
        <p>Try identifying the logos below. The blurrier they are, the more points you’ll get for a correct guess. When you can’t guess anymore, you can make it easier by sharpening the logos.</p>
        <p><a href="#">Read more about this experiment &raquo;</a></p>
    </header>

    <nav class="navigation">
        <div class="sharpen">
            <a href="#" title="Sharpen the logos">Make It Easier!</a>
        </div>
        <div class="points">0</div>
    </nav>

    <section class="container wrap" data-active-blur-value="20">

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
                    $i++;
                }
            ?>
        </ul>

    </section>

    <div class="congrats">
        <div class="wrapper">
            <h2 class="final-score">Congrtulations on your score!</h2>
            <p class="final-score-points">0</p>
            <ul class="final-score-share">
                <li><a href="#" class="icon-twitter">Tweet your score</a></li>
                <li><a href="#" class="icon-facebook">Share your score</a></li>
                <li><a href="#" class="icon-play-again">Play again</a></li>
            </ul>
        </div>
    </div>

    <footer>
        <p>Created by <a href="http://jim-nielsen.com/">Jim Nielsen</a>. Got feedback? Tweet me <a href="http://twitter.com/jimniels/">@jimniels</a>.</p>
    </footer>

    <script type="text/javascript" src="assets/scripts/jquery.js"></script>
    <script type="text/javascript" src="assets/scripts/scripts.js"></script>
    <script type="text/javascript" src="assets/scripts/fuzzySet.js"></script>    


</body>
</html>