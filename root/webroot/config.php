<?php

# Config-file
# copyright The Actic Flame UF
 

# Set the error reporting.
error_reporting(E_ALL);             # Report all type of errors
ini_set('display_errors', 1);     	# Display all errors 
ini_set('output_buffering', 0);   	# Do not buffer outputs, write directly
 

# Define Anax paths.
define('FOREST_INSTALL_PATH', __DIR__ . '/..');
define('FOREST_THEME_PATH', FOREST_INSTALL_PATH . '/theme/render.php');
 

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
    'fonts.css',
    'style.css'
);
$forest['favicon']    	= '';


# Settings for JavaScript.
$forest['javascript_include'] = array();

# Menu
$menu = array(
	'guide'  => array('text'=>'Guide',  'url'=>'', 'class'=>''),
	'about' => array('text'=>'About', 'url'=>'', 'class'=>''),
	'login' => array('text'=>'Login', 'url'=>'', 'class'=>'login'),
    'sign up' => array('text'=>'Sign up', 'url'=>'', 'class'=>'login signup')
);

# Database connection
$anax['connect'] = array(
	'dsn' => 'mysql:host=localhost;dbname=Movie;',
    'username' => 'root',
    'password' => '',
    'driver_options' => array(
    	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
    ),
    'fetch_style' => PDO::FETCH_OBJ
);