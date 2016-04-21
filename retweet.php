<?php

require_once('twitteroauth.php');

define('CONSUMER_KEY', 'txjlQg4rRNxS7j1Yo2d9mbvTX');
define('CONSUMER_SECRET', 'ealpSCejVP0mJ8wapZw7e5YYds3GrXcqaScjwUuJlSsnxp0X77');
define('ACCESS_TOKEN', '722396660043804672-27sKsta28ZjOQnbSsEAwQYLOSJxzR6T');
define('ACCESS_TOKEN_SECRET', 'JVyEXNU2NJlKcyWt8frnSH6ShuUqCXFPcdyBqZjfYHR2T');


$conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$tweets = $conn->get("statuses/user_timeline", array("count" => 1, "exclude_replies" => true));
//print_r(array_values($tweets));

foreach ($tweets as $tweet) {
 echo '<p>'.$tweet->text.'<br>Posted on: <a href="https://twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id.'">'.date('Y-m-d H:i', strtotime($tweet->created_at)).'</a></p>';
}