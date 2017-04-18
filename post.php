<?php

session_start();
require('twitteroauth/twitteroauth.php');

$connection = new TwitterOAuth('4JPhVqb8l96ViuOlQaDKQK85h', 'E7chGojc5ZwNfAEHeI5BQDtk5xCKHL7N7GAl4QBM6Anfa6mIYR', $_SESSION['def_oauth_token'], $_SESSION['def_oauth_token_secret']);


$result = $connection->post('statuses/update',array('status'=>$_POST['tweet']));
print_r($result);

?>
