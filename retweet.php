<?php

require_once('twitteroauth.php');

define('CONSUMER_KEY', 'consumer_key');
define('CONSUMER_SECRET', 'consumer_secret');
define('ACCESS_TOKEN', 'access_token');
define('ACCESS_TOKEN_SECRET', 'access_token_secret');


$conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$tweets = $conn->get("statuses/user_timeline", array("count" => 1, "exclude_replies" => true));
//print_r(array_values($tweets));

foreach ($tweets as $tweet) {
 echo '<p>'.$tweet->text.'<br>Posted on: <a href="https://twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id.'">'.date('Y-m-d H:i', strtotime($tweet->created_at)).'</a></p>';
}
