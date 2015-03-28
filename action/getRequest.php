<?php
$value = (isset($_POST['value'])) ? $_POST['value'] : 'bunnies';
//file that creates oauth for twitter request
require_once('oauth.php');

//set keys
$settings = array(
    'token' => "62672830-edmVnLsbSJ9WZ95QDnOdqqLBaZked5byfP1MpPXoO",
    'secret' => "4z76IzTE8brTtQxWwWMVzTcvu75WNVnshtbLkX5kCgbj9",
    'consumer_key' => "lAy8keqohZIImu0Et0g3pe5il",
    'consumer_secret' => "hbM8eF6EdJh52gScC29skbIMQp2xEwfdtBd3zZkARHVBXShnw8"
);
//build request
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$params = array('q'=>$value);
//builds new oauth
$twitter = new tmhOAuth($settings);
//makes request
$twitter->request($requestMethod, $url, $params);
//decode response
$response = json_decode($twitter->response['response'], true);
//array to hold 15 tweets 
$tweets = [];
//loops throught data response and stores tweets into $tweets[]
function getTweets($response){
    
    for($i = 0; $i < 15; $i++){
    $tweets[] = $response['statuses'][$i]['text'];
    }
     return $tweets;
}
//output array
$r = array(
    'success'=>true,
    'data'=>null,
    'message'=>''
);

if(!$response){
    $r['success'] = false;
    $r['message'] = "Response could not be decoded";
}else{
    $r['data'] = array(
        'tweets'=>getTweets($response),
    );
}
//encode and echo output array
echo json_encode($r);
?>