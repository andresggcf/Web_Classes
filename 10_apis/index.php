<?php 

//Index para el curso de API de TWITTER

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerkey = "get keys from twitter api";
$consumersecret = "secret";

$accesstoken = "get tokens from twitter api";
$accesstokenSecret = "secret too";

$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokenSecret);
$content = $connection->get("account/verify_credentials");

//$statues = $connection->post("statuses/update", ["status" => "This came from my twitter App"]);

$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

//print_r($statuses)

foreach ($statuses as $tweet) {
	//print_r($tweet->favorite_count);

	if ($tweet->favorite_count >= 3){
		$status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
		echo $status->html;
	}

	
}

 ?>