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
        <h1 class="h1" id="h1">Logos Test</h1>
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
                    "Starbucks",
                    "Intel",
                    "Jumpman",
                    "Target",
                    "Honda",
                    "CNN",
                    "ABC",
                    "Twitter",
                    "Univision",
                    "CBS",
                    "General Electric",
                    "ESPN",
                    "Hyundai",
                    "MTV",
                    "John Deere"
                );
                foreach ($logos as $key) {
                    ?>
                        <li>
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