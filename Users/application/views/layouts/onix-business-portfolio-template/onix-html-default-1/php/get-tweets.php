<?php
require_once("twitteroauth/twitteroauth.php");
 
$twitteruser = "PavelYak";
$counttweets = 10;
$consumerkey = "31WiIeZGauQEfugPI2kdqQ";
$consumersecret = "Yxu7pDvAMyJKPUVPXlTffp1AwXwvXrujwhI8DnKP9A";
$accesstoken = "38614063-xYgDRqUr15MRdsGuw4DazcavdGXIudbjRou297XNL";
$accesstokensecret = "sjN6W2iUN9OWuZ8un2wEne4sP44KoMvzBZIB5Mbjus";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$counttweets);
 
echo json_encode($tweets);
?>