<?php
// // Start output buffering
// ob_start();
// // run code in x.php file
// include('dev.php');
// // saving captured output to file
// file_put_contents('index.html', ob_get_contents());
// // end buffering and displaying page
// ob_end_flush();

//
//
//  Logos sass file
//  ==============================
//  Write out _logos-generated.scss
//  This file contains a sass array of all our brands
//

// Start buffer
ob_start();

// Stuff we're writing
$logos = json_decode( file_get_contents("brands.json"), true);
echo '$logos: ';
foreach($logos as $key => $val) {
    echo "\n ".$key;
}
echo ';';

// End buffer
file_put_contents('assets/css/src/_logos-generated.scss', ob_get_contents());
ob_end_flush();