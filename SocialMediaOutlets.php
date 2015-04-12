<?php
$message = "testing testing hello";//$_POST['Message']
session_start();
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
use Facebook\FacebookSession as FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException as FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

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
    FacebookSession::setDefaultApplication('1628939997340252','3c202c339b6e4c59b308ae62fcc86f5e');

    // Use one of the helper classes to get a FacebookSession object.
    //   FacebookRedirectLoginHelper
    //   FacebookCanvasLoginHelper
    //   FacebookJavaScriptLoginHelper
    // or create a FacebookSession with a valid access token:
    $helper = new \Facebook\FacebookRedirectLoginHelper('http://localhost/NHSWebsite/PostToPage.php');
    $loginUrl = $helper->getLoginUrl();
    echo "<a href = ${loginUrl}>Click here</a>";
    

    // Get the GraphUser object for the current user:

    /*try {
      $me = (new FacebookRequest(
        $session, 'GET', '/me'
      ))->execute()->getGraphObject(GraphUser::className());
      echo $me->getName();
    } catch (FacebookRequestException $e) {
      // The Graph API returned an error
    } catch (\Exception $e) {
      // Some other error occurred
    }*/
    //Getting the access key
    //FacebookSession::setDefaultApplication('1628939997340252', '3c202c339b6e4c59b308ae62fcc86f5e');
    
   
    /*$chGetAccessToken = curl_init();
    $getAccessURL = "https://graph.facebook.com/oauth/access_token?client_id=1628939997340252&client_secret=3c202c339b6e4c59b308ae62fcc86f5e&grant_type=client_credentials";
    curl_setopt($chGetAccessToken, CURLOPT_URL, $getAccessURL);
    curl_setopt($chGetAccessToken, CURLOPT_RETURNTRANSFER, 1);
    $accessToken = curl_exec($chGetAccessToken);
    echo $accessToken;
    $session = new FacebookSession($accessToken);
    
    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request->execute();
    $graphObject = $response->getGraphObject();
    print $graphObject;*/
    /*
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