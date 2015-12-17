<!DOCTYPE html>

<html lang='<?=$lang?>'>
<head>
	<meta charset='utf-8'/>
	<title><?=get_title($title)?></title>

	<?php if(isset($favicon)): ?>
		<link rel='shortcut icon' href='<?=$favicon?>'/>
	<?php endif; ?>
	
	<?php foreach($stylesheets as $val): ?>
		<link rel='stylesheet' type='text/css' href='<?=$val?>'/>
	<?php endforeach; ?>

	<?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
		<script src='<?=$val?>'></script>
	<?php endforeach; endif; ?>
</head>
<body>
	<?php echo Navigation::GenerateMenu($menu, "navbar"); ?>

	<div id='wrapper'>
    	<div id='header'><?=$header?></div>
    	<div id='main'><?=$main?></div>
    	<div id='footer'><?=$footer?></div>
  	</div>
</body>
</html>