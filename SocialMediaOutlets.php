<?php
$message = "testing testing hello";//$_POST['Message']
function postToTwitter($message)
{
    require_once('codebird-php-develop/src/codebird.php');
 
    \Codebird\Codebird::setConsumerKey("xQLlqWFsObilU1omDlP32g80a", "yrppLlhpdmHbLv3wOjyTN3DHLa9L6AmZEShdWP2z68pySxw1rx");
    $cb = \Codebird\Codebird::getInstance();
    $cb->setToken("1485424604-aGwtCYnZzvax95Zksw7M3vSn4wfnx8gyO3ujfiy", "sAD8J6S5U4oX6i7GF89ShIPYPbFcqELMoYXnIN9ty65x5");

    $params = array(
<<<<<<< Updated upstream
<<<<<<< HEAD
      'status' => $message
=======
      'status' => 'this might be sadat'
>>>>>>> origin/master
=======
      'status' => '@ElProfeLowe This is Dan Xu'
>>>>>>> Stashed changes
    );
    $reply = $cb->statuses_update($params); 
}
function postToFacebook($message)
{
    $access_token = 'CAAXJgyXm4lwBAKmYkHouk84T4bbmSwrveqtjPZABPcgBZCZANMmkrlE1VRRBbYijHnQsXTLV78Iv6WgZB5yXPGJRfsHuYQsqnHd0SOCejNzLKgw2jqGATsWarVzJ6qBLCrKXRhymLfKFiOprGZC9hRoW4NAm5FJiaSAW3jpSbPZCS4AiDRlceqzZCFZCbHR6gD3Vd3dXJZAslwgZDZD';
    $page_id = '966154336750593';
    
    $data['message'] = "yoyoyoyoyo";
    
    $data['access_token'] = $access_token;
    //$post_url = 'https://graph.facebook.com/'.$page_id.'/feed';
    $post_url = '/'.$page_id.'/feed';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $post_url);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $return = curl_exec($ch);
    echo $return;
    
    curl_close($ch);
}

postToFacebook($message)
?>