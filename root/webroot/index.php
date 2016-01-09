<?php
# Include config
include(__DIR__ . '/config.php');

$forest['title'] = "Home";
 
$forest['header'] = <<<EOD
<div id="head">
	<div id="logo"></div>
</div>
EOD;
 
$forest['main'] = "";
 
$forest['footer'] = "";
 
# Render file
include(FOREST_THEME_PATH);