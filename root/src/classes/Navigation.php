<?php
class Navigation {
	public function __construct() {}

	public static function GenerateMenu($items, $class) {
    	$html = "<nav class='$class'>\n";
      $html .= "<a href=''><img src='img/logo-vit.svg' alt='Site logo'></a>";
    	
    	foreach($items as $key => $item) {
      		$selected = (isset($_GET['p'])) && $_GET['p'] == $key ? 'selected' : null;
     	 	  $html .= "<a href='{$item['url']}' class='navitem {$selected} {$item['class']}'>{$item['text']}</a>\n";
    	}

    	$html .= "</nav>\n";
    	return $html;
  	}
}