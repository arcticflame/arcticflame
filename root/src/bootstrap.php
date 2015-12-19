<?php

# Exception handler.
function myExceptionHandler($e) {
	echo "Uncaught exception: <p>" . $e->getMessage() . "</p><pre>" . $e->getTraceAsString(), "</pre>";
}

set_exception_handler('myExceptionHandler');


# Autoloader for classes.
function Autoloader($class) {
  	$path = FOREST_INSTALL_PATH . "/src/classes/{$class}.php";

  	if(is_file($path)) {
    	include($path);
  	}
  	else {
    	throw new Exception("Classfile '{$class}' does not exists.");
  	}
}

spl_autoload_register('Autoloader');