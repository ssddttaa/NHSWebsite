<?php
/*if(!isset($_POST['updateField']))
{
    header("location:admin.php");
}*/
session_start();
$message = $_POST['updateField'];
$filePath = 'vendor/facebook/php-sdk-v4/src/Facebook/';
require_once($filePath.'FacebookSession.php');
require_once($filePath.'FacebookRequest.php');
require_once($filePath.'FacebookResponse.php');
require_once($filePath.'FacebookSDKException.php');
require_once($filePath.'FacebookRequestException.php');
require_once($filePath.'FacebookRedirectLoginHelper.php');
require_once($filePath.'FacebookAuthorizationException.php');
require_once($filePath.'FacebookServerException.php');
require_once($filePath.'GraphObject.php');
require_once($filePath.'GraphUser.php');
require_once($filePath.'GraphSessionInfo.php');
require_once($filePath.'Entities/AccessToken.php');
require_once($filePath.'HttpClients/FacebookCurl.php');
require_once($filePath.'HttpClients/FacebookHttpable.php');
require_once($filePath.'HttpClients/FacebookCurlHttpClient.php');
require_once('vendor/schoology_php_sdk-master/SchoologyApi.class.php');
use Facebook\FacebookSession as FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException as FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;
$appID = '1445019925795431';
$appSecret = '777950f6896a07f18592e375e82ff465';
$accountID = '386444624895902';
$pageID = '360571057466262';
function postToTwitter($message)
{
    require_once('codebird-php-develop/src/codebird.php');
 
    \Codebird\Codebird::setConsumerKey("aANOKu9972CHj8ccxoLTd4xi8", "ZgJatPMGTd2Trb5qun9g6EwaRXpFFllSg7y6LYLjIGgxGjWS5j");
    $cb = \Codebird\Codebird::getInstance();
    $cb->setToken("3297100085-LGDNKKgfCaI9Tqlg2nEFLQu3slWcK3mzl4gWHqE", "JI3sp43GJEefc9cIGxzoQ32Usfr3WxJFawgBYHsUdERWc");
    $params = array(

      'status' => $message

    );
    $reply = $cb->statuses_update($params); 
}
function postToFacebook($message, $accessToken)
{
    global $appID;
    global $appSecret;
    global $accountID;
    global $pageID;
    $accessToken = $accessToken;
    FacebookSession::setDefaultApplication('1445019925795431','777950f6896a07f18592e375e82ff465');
    $facebookSession = new FacebookSession($accessToken);
    print_r(array('access_token'=>${accessToken},'message'=>$message));
    $postMessage = new FacebookRequest($facebookSession, "POST", "/${pageID}/feed",array('access_token'=>${accessToken},'message'=>$message));
    $facebookResponse = $postMessage->execute();
}
function postToSchoology($message)
{
    $consumerKey = '5e8d3eb0c117a3df05a1ed15d2ef9e7b055628b4b';
    $consumerSignature = '80ec72feeaedc39d82747f167e8e1820'; //same thing as consumer secret
    $nhsSchoologyGroupID = '284786740';    
    $schoology = new SchoologyApi($consumerKey, $consumerSignature, '', '','', TRUE);
    $schoologyResponse = $schoology->api("groups/${nhsSchoologyGroupID}/updates", "POST", array('body'=>$message));
    print_r($schoologyResponse);
}
function refreshToken($shortAccessToken)
{
    global $appID;
    global $appSecret;
    FacebookSession::setDefaultApplication('1445019925795431','777950f6896a07f18592e375e82ff465');
    $session = new FacebookSession($shortAccessToken);
    $facebookRequest = new FacebookRequest($session, "GET", "/oauth/access_token?grant_type=fb_exchange_token&client_id=${appID}&client_secret=${appSecret}&fb_exchange_token=${shortAccessToken}");
    $response = $facebookRequest->execute();
    $graphObject = $response->getGraphObject();
    $longLivedAccess = $graphObject->getProperty('access_token');
    echo $longLivedAccess;
    return $longLivedAccess;
}
function makeAllApiCalls()
{
    if(isset($_POST['facebook'])&&$_POST['facebook'] === 'on')
    {
        postToFacebook($message,refreshToken("CAAUiPOte0mcBAMyoUavFMQx0iLd6t9GIgzMjk2ZB2LyBIDpX7G73KFYNTiYSc928ibCukB0mV756JpqLErI34ZCgjrmZArTp1ZBeq3mG2GiLRR6f27rGgfvfNDdVeau1sHV1ibbCapyls35MIUplNtSMsUrBvIhyygro2TZB0bhBgT5LISVOv09ulmaLPWJ4jQ0J2NqMdnhZBPlr57w5qqTiwTbJMq7WsZD"));
    }
    if(isset($_POST['schoology'])&&$_POST['schoology'] === 'on')
    {
        postToSchoology($message);
    }
    if(isset($_POST['twitter'])&&$_POST['twitter'] === 'on')
    {
        postToTwitter($message);
    }
}

makeAllApiCalls();

