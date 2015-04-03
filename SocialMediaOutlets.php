<?php
$message = "testing testing hello";//$_POST['Message']
session_start();
require('facebook-php-sdk-v4-4.0-dev/src/Facebook/FacebookRedirectLoginHelper.php');
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSDKException;
use Facebook\FacebookSession;
function postToTwitter($message)
{
    require_once('codebird-php-develop/src/codebird.php');
 
    \Codebird\Codebird::setConsumerKey("xQLlqWFsObilU1omDlP32g80a", "yrppLlhpdmHbLv3wOjyTN3DHLa9L6AmZEShdWP2z68pySxw1rx");
    $cb = \Codebird\Codebird::getInstance();
    $cb->setToken("1485424604-aGwtCYnZzvax95Zksw7M3vSn4wfnx8gyO3ujfiy", "sAD8J6S5U4oX6i7GF89ShIPYPbFcqELMoYXnIN9ty65x5");

    $params = array(
      'status' => $message
    );
    $reply = $cb->statuses_update($params); 
}
function postToFacebook($message)
{
    $helper = new FacebookRedirectLoginHelper('index.php','1628939997340252','3c202c339b6e4c59b308ae62fcc86f5e');
    try
    {
        $session = $helper ->getSessionFromRedirect();
    } catch (FacebookSDKException $e) {
        $session = null;
    }
    if($session)
    {
        $accessToken = $session->getAccessToken();
        $longLivedAccessToken = $accessToken->extend();
        echo $longLivedAccessToken;
    }
    else
    {
        echo "didnt work";
    }
    //Getting the access key
    /*$chGetAccessToken = curl_init();
    $getAccessURL = "https://graph.facebook.com/oauth/access_token?client_id=1628939997340252&client_secret=3c202c339b6e4c59b308ae62fcc86f5e&grant_type=client_credentials";
    curl_setopt($chGetAccessToken, CURLOPT_URL, $getAccessURL);
    curl_setopt($chGetAccessToken, CURLOPT_RETURNTRANSFER, 1);
    $accessToken = curl_exec($chGetAccessToken);
    echo $accessToken;
    curl_close($chGetAccessToken);
    
    $page_id = '633801056751107';
    
    $data['message'] = $message;
    
    $data['access_token'] = $accessToken;
    
    $get_url = 'https://graph.facebook.com/100005480894198';*/
    
    
    /*$chPostMessage = curl_init();
    curl_setopt($chPostMessage, CURLOPT_URL, $get_url);
    $post_url = 'https://graph.facebook.com/'.$page_id.'/feed';
    curl_setopt($chPostMessage, CURLOPT_URL, $post_url);
    curl_setopt($chPostMessage,CURLOPT_POST, 1);
    curl_setopt($chPostMessage, CURLOPT_POSTFIELDS, $data);
    curl_setopt($chPostMessage, CURLOPT_RETURNTRANSFER,1);
    $return = curl_exec($chPostMessage);
    echo "Return 2:".$return;
    
    curl_close($chPostMessage);*/
}

postToFacebook($message)
?>