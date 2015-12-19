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

	<div id="overlay"></div>

	<div id="loginarea">
		<button class="close" title="Close" onclick="hideLoginArea()"></button>

		<header>
			<h1>Welcome</h1>
			<i class="fa fa-sign-in fa-2x"></i>
		</header>
		
		<form method="POST" id="loginform" onsubmit="return login()">
			<div class="tags"><input type="text" name="username" id="username" placeholder="USERNAME"></div>
			<div class="tags"><input type="password" name="password" id="password" placeholder="PASSWORD"></div>
			<div class="arrow"></div>
			<label for="remember" id="remember_label">
				<input type="checkbox" name="remember" id="remember">
				<div id="checkbox"></div>
				<span>Remember me</span>
			</label>
			<input type="submit" name="submit" value="LOGIN" id="login_btn">
		</form>

		<div id="loginmsg"></div>

		<div id="forgotten">
			<a href="#">Forgot Password?</a>
		</div>
	</div>

	<div id='wrapper'>
    	<div id='header'><?=$header?></div>
    	<div id='main'><?=$main?></div>
    	<div id='footer'><?=$footer?></div>
  	</div>
</body>
</html>