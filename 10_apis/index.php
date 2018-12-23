<?php 

//Index para el curso de API de TWITTER

require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerkey = "ctHfrjFdnIjf2vmgA1VOYkORw";
$consumersecret = "TOOYuHk2qwDeV86BRYYHlXUY2db6NLk2UJ3blBIgB6qjA4c4Vy";

$accesstoken = "1197282679-jDMS2dygUBjFhFfG6lx5Ci34KoSbCeyvTimKi3m";
$accesstokenSecret = "MGHyzxYfuS1yj7X6pnI4sp3VcSRPVIFHUwMN4dlTF7vBp";

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