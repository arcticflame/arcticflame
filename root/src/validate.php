<?php
# Include config
include(__DIR__ . '/../webroot/config.php');
header('Content-type: application/json');

if(!isset($_POST['rem']))
	die("Access denied!");

$username = htmlentities(trim($_POST['u']), ENT_QUOTES, "utf-8");		# Username
$password = htmlentities(trim($_POST['p']), ENT_QUOTES, "utf-8");		# Password
$remember = htmlentities(trim($_POST['rem']), ENT_QUOTES, "utf-8");		# Boolean

if($username == "" || $password == "" || strlen($password) < 5) {
	echo json_encode(array('msg' => 'Invalid username or password.', 'status' => '0'));
	exit;
}

$validator = new Validatelogin($forest['connect']);

$check = $validator->check($username, $password);

if($check) {
	if($validator->setUser($username)) {
		$res = array(
			'msg' => '',
			'status' => '1'
		);
	}
	else {
		$res = array(
			'msg' => 'User not yet activated.',
			'status' => '0'
		);
	}
}
else {
	$res = array(
		'msg' => 'Invalid username or password.',
		'status' => '0'
	);
}

echo json_encode($res);
exit;