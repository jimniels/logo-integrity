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

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
            <a href="#" title="Sharpen the logos">Sharpen the Logos</a>
        </div>
        <div class="points score-current">0</div>
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

    <footer class="footer">
        <p>Created by <a href="http://jim-nielsen.com/">Jim Nielsen</a>. Got feedback? Tweet me <a href="http://twitter.com/jimniels/">@jimniels</a>.</p>
    </footer>

    <script type="text/javascript" src="assets/scripts/jquery.js"></script>
    <script type="text/javascript" src="assets/scripts/scripts.js"></script>
    <script type="text/javascript" src="assets/scripts/fuzzySet.js"></script>  

    <script type="text/html" id="template-brand-form">
        <form class="form">
            <input type="text" />
            <label>Guess the brand:</label>
            <button type="submit">Guess</button>
        </form>
    </script>  
    <script type="text/html" id="template-share-modal">
        <div class="share-modal">
            <div class="wrapper">
                <h2 class="score-final-title">Congratulations on your score!</h2>
                <p class="score-final">0</p>
                <ul class="score-final-share clearfix">
                    <li><a href="#" class="icon-twitter" target="_blank">Tweet your score</a></li>
                    <li><a href="#" class="icon-facebook" target="_blank">Share your score</a></li>
                    <li><a href="#" class="icon-play-again">Play again</a></li>
                </ul>
                <p class="made-by">Made by: <a href="http://jim-nielsen.com/" title="Jim's Homepage">Jim Nielsen</a>, a.k.a. <a href="http://twitter.com/jimniels" title="Jim Nielsen on Twitter">@jimniels</a></p>
            </div>
        </div>
    </script>


</body>
</html>