<?php

date_default_timezone_set('UTF-8');
$imagename = date("Y-m-d H:m").".png";
$file = $_GET['file'];

header('Content-disposition: attachment; filename='.$imagename);
header('Content-type: image/png');
readfile($file);
exit;