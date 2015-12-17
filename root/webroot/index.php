<?php
# Include config
include(__DIR__.'/config.php');

$forest['title'] = "Hello World";
 
$forest['header'] = <<<EOD
EOD;
 
$forest['main'] = <<<EOD
EOD;
 
$forest['footer'] = <<<EOD
EOD;
 
# Render file
include(FOREST_THEME_PATH);