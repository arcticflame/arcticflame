<!DOCTYPE html>

<html lang='<?=$lang?>'>
<head>
	<meta charset='utf-8'/>
	<title><?=get_title($title)?></title>

	<?php if(isset($favicon)): ?>
		<link rel='shortcut icon' href='<?=$favicon?>'/>
	<?php endif; ?>
	
	<?php foreach($stylesheets as $val): ?>
		<link rel='stylesheet' type='text/css' href='css/<?=$val?>'/>
	<?php endforeach; ?>

	<?php if(isset($javascript_include)): foreach($javascript_include as $val): ?>
		<script src='js/<?=$val?>'></script>
	<?php endforeach; endif; ?>
</head>
<body>
	<?php echo Navigation::GenerateMenu($menu, "navbar"); ?>

	<<div id="overlay"></div>

	<div id="loginarea">
		<form method="POST" action="" id="loginform">
			<div class="tags"><input type="text" name="username" id="username" placeholder="USERNAME"></div>
			<div class="tags"><input type="password" name="password" id="password" placeholder="PASSWORD"></div>
			<div class="arrow"></div>
			<input type="submit" name="submit" value="Login" id="login_btn">

			<label for="remember" id="remember_label">
				<input type="checkbox" checked="checked" name="remember" id="remember">
				<span>Remember me</span>
			</label>
		</form>
	</div>

	<div id='wrapper'>
    	<div id='header'><?=$header?></div>
    	<div id='main'><?=$main?></div>
    	<div id='footer'><?=$footer?></div>
  	</div>
</body>
</html>