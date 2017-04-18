<?php

session_start();

require('twitteroauth.php');

$connection = new TwitterOAuth('4JPhVqb8l96ViuOlQaDKQK85h', 'E7chGojc5ZwNfAEHeI5BQDtk5xCKHL7N7GAl4QBM6Anfa6mIYR');
$request_token = $connection->getRequestToken();

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$url = $connection->getAuthorizeURL($request_token['oauth_token'],false);

header('Location: '.$url);
?>
