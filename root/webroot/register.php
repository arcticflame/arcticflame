<?php
# Include config
include(__DIR__ . '/config.php');

$forest['title'] = "Register";
 
$forest['header'] = <<<EOD
	<h1>REGISTER</h1>
EOD;
 
$forest['main'] = <<<EOD
	<div id="topbanner">
		hello my friend
	</div>

	<form method="POST" id="registerform" onsubmit="return register()">
		<h3>Email</h3>
		<div class="tags regtag">
			<input type="email" name="regemail" id="regemail" placeholder="example@example.com">
		</div>

		<h3>reenter email</h3>
		<div class="tags regtag">
			<input type="email" name="re_regemail" id="re_regemail" placeholder="example@example.com">
		</div>

		<h3>password</h3>
		<div class="tags regtag">
			<input type="password" name="regpassword" id="regpassword" placeholder="****************">
		</div>

		<h3>reenter password</h3>
		<div class="tags regtag">
			<input type="password" name="re_regpassword" id="re_regpassword" placeholder="****************">
		</div>

		<div id="textcontainer">
			<h3 class="nameh3">firstname</h3>
			<h3 class="nameh3">lastname</h3>
		</div>

		<div class="tags regtag name">
			<input type="text" name="regfirstname" id="regfirstname" placeholder="Adam">
		</div>

		<div class="tags regtag name">
			<input type="text" name="reglastname" id="reglastname" placeholder="Andersson">
		</div>

		<h3>date of birth</h3>
		<div class="tags regtag">
			<input type="text" name="regbirthdate" id="regbirthdate" placeholder="YYYYMMDD-XXXX">
		</div>
	</form>
EOD;
 
$forest['footer'] = "";
 
# Render file
include(FOREST_THEME_PATH);