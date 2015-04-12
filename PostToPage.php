<?php
$filePath = 'vendor/facebook/php-sdk-v4/src/Facebook/';
require_once($filePath.'FacebookSession.php');
require_once($filePath.'FacebookRequest.php');
require_once($filePath.'FacebookResponse.php');
require_once($filePath.'FacebookSDKException.php');
require_once($filePath.'FacebookRequestException.php');
require_once($filePath.'FacebookRedirectLoginHelper.php');
require_once($filePath.'FacebookAuthorizationException.php');
require_once($filePath.'GraphObject.php');
require_once($filePath.'GraphUser.php');
require_once($filePath.'GraphSessionInfo.php');
require_once($filePath.'Entities/AccessToken.php');
require_once($filePath.'HttpClients/FacebookCurl.php');
require_once($filePath.'HttpClients/FacebookHttpable.php');
require_once($filePath.'HttpClients/FacebookCurlHttpClient.php');
require_once($filePath.'FacebookServerException.php');
require_once($filePath.'FacebookPermissionException.php');
require_once($filePath.'FacebookClientException.php');
use Facebook\FacebookSession as FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException as FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;
session_start();
$app_ID = '1628939997340252';
$app_secret = '3c202c339b6e4c59b308ae62fcc86f5e';
$page_ID = '633801056751107';
$group_ID = '966154336750593';
FacebookSession::setDefaultApplication($app_ID,$app_secret);
$helper = new FacebookRedirectLoginHelper('http://localhost/NHSWebsite/PostToPage.php');
$session = null;
try
{
    $session = $helper->getSessionFromRedirect();
    
} catch(FacebookRequestException $ex)
{
    echo "facebook request exception".$ex;
}
catch (\Exception $ex) {
    echo "exception".$ex;
}
if($session)
{
    //get user access token
    $currentAccessToken = $session->getAccessToken();
    $requestID = new FacebookRequest($session, 'GET',"/me?fields=id");
    $IDRequestResponse = $requestID->execute();
    $IDObject = $IDRequestResponse->getGraphObject();
    $userID = $IDObject->getProperty('id');
    //echo "/oauth/access_token?client_id=${userID}&client_secret=${app_secret}&grant_type=fb_exchange_token&fb_exchange_token=${currentAccessToken}";
    $request = new FacebookRequest($session, 'GET', "/oauth/access_token?client_id=${app_ID}&client_secret=${app_secret}&grant_type=fb_exchange_token&fb_exchange_token=${currentAccessToken}");
    $response = $request->execute();
    $graphObject = $response->getGraphObject();
    //get long lived token
    $longLivedToken = $graphObject->getProperty('access_token');
    $params = array(
        "message"=>"testing testing".time(),
    );
    //echo "/${app_ID}/feed";
    $longLivedSession = new FacebookSession($longLivedToken);
    
    //getting the page access token using the long lived token
    
    $getPageAccess = new FacebookRequest($longLivedSession, 'GET','/'.$page_ID.'?fields=access_token');
    $pageTokenResponse = $getPageAccess->execute();
    $accessToken = $pageTokenResponse->getGraphObject()->getProperty('access_token');
    //create a new session from the page now
    $pageSession = new FacebookSession($accessToken);
    if($pageSession)
    {
        $postToPage = new FacebookRequest($pageSession, 'POST',"/${page_ID}/feed", $params);
        $postingResponse = $postToPage->execute();
        $postToGroup = new FacebookRequest($longLivedSession, 'POST',"/${group_ID}/feed", $params);
        $postingToGroupResponse = $postToGroup->execute();
        header("Location: www.google.com");
        
    }
    else
    {
        echo "no page session exists";
    }
    
    
    
}
else
{
    echo "no session";
}
