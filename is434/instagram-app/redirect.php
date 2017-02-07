<?php
require 'Instagram.php';

use MetzWeb\Instagram\Instagram;

$instagram = new Instagram(array(
	'apiKey' => 'f1f26f4d781945b094a906ae5b90b061',
	'apiSecret' => '96c725ad6d234a769de3f21f71a2f6c9',
	'apiCallback' => 'http://localhost:8080/is434/instagram-app/redirect.php'
));

$code = $_GET['code'];
$data = $instagram->getOAuthToken($code);
$instagram->setAccessToken($data);
$likes = $instagram->getUserLikes();

print_r($data);
print_r($instagram->getUserFollower());
echo 'Your username is: ' . $data->user->username;
echo '<pre>';
print_r($likes);
echo '<pre>';

?>