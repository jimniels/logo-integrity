<?php
// Start output buffering
ob_start();
// run code in x.php file
include('dev.php');
// saving captured output to file
file_put_contents('index.html', ob_get_contents());
// end buffering and displaying page
ob_end_flush();