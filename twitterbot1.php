<?php

ini_set('display_errors',1);  
error_reporting(E_ALL);

require_once('twitteroauth.php');

define('CONSUMER_KEY', 'consumer_key');
define('CONSUMER_SECRET', 'consumer_secret');
define('ACCESS_TOKEN', 'access_token');
define('ACCESS_TOKEN_SECRET', 'access_token_secret');

//Open twitter API
$conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

//Build the query - Additional options can be found at https://dev.twitter.com/rest/reference/get/search/tweets
$query = array(
 "q" => "EMChamberNews -RT", //Key word or hashtag - (-RT means exclude retweets.
 "count" => 1, //Number of tweets to retweet
 "result_type" => "recent", //recent, popular or mixed
 "iso_language_code" => "en" //language of the tweet
);

//Fetch query results
$tweets = $conn->get('search/tweets', $query);

//Build tweets from query and post to twitter
foreach ($tweets->statuses as $tweet) {

 	$status = 'RT @'.$tweet->user->screen_name.' '.$tweet->text.'';
	echo $status;
	if(strlen($status) > 140) $status = substr($status, 0, 139);
	$conn->post('statuses/update', array('status' => $status));
}

echo '<p>Success!!!</p>';