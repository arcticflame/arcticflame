<?php

# Config-file
# copyright The Actic Flame UF
 

# Set the error reporting.
error_reporting(E_ALL);             # Report all type of errors
ini_set('display_errors', 1);     	# Display all errors 
ini_set('output_buffering', 0);   	# Do not buffer outputs, write directly
 

# Define Forest paths.
define('FOREST_INSTALL_PATH', __DIR__ . '/..');
define('FOREST_THEME_PATH', FOREST_INSTALL_PATH . '/theme/render.php');
define('FOREST_CRYPT_PATH', FOREST_INSTALL_PATH . '/src/crypt.php');
 

# Include bootstrapping functions.
include(FOREST_INSTALL_PATH . '/src/bootstrap.php');
 

# Start the session.
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();
 
 
# Create the forest variable.
$forest = array();
 
 
# Site settings.
$forest['lang']         = 'en';
$forest['title_append'] = ' | The Arctic Flame';


# Theme related settings.
$forest['stylesheets'] 	= array(
    'css/fonts.css',
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
    'css/style.css'
);

$forest['favicon']    	= '';


# Settings for JavaScript.
$forest['javascript_include'] = array(
    'js/jquery-1.11.3.min.js',
    'js/login.js'
);

# Menu
$menu = array(
	'guide'  => array('text'=>'Guide',  'url'=>'', 'class'=>''),
	'about' => array('text'=>'About', 'url'=>'', 'class'=>'')
);

# Database connection
$forest['connect'] = array(
	'dsn' => 'mysql:host=localhost;dbname=test;',
    'username' => 'root',
    'password' => '',
    'driver_options' => array(
    	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
    ),
    'fetch_style' => PDO::FETCH_OBJ
);