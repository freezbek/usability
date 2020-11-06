<?php
// Requires php5
define('UPLOAD_DIR', 'testImage/');
$img = $_POST['imgBase64'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$name = 'Gleb';
$surname = 'Kosheev';
$university = 'GUD';
$file = UPLOAD_DIR . $name . $surname . $university . '.png';
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
?>