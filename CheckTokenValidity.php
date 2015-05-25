<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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


class CheckTokenValidity
{
    function extendTo16Chars($password)
    {
        //In order for the AES Encryption to work, the key has to be of 16 characters, so this extends the password to that length
        $modifiedPassword = '';
        for($a = 0;$a<floor((16/strlen($password)));$a++)
        {
            $modifiedPassword .= $password;
        }
        $modifiedPassword .= substr($password, 0,(16%strlen($password)));
        
        return $modifiedPassword;
    }
    function getFileContents()
    {
        $fileName = 'info.json';
        $encryptedJsonData = file_get_contents($fileName);
        $encryptedTokenArray = json_decode($encryptedJsonData, true);
        $EncryptedAccessToken =  $encryptedTokenArray['EncryptedAccesToken'];
        return $EncryptedAccessToken;
    }
    function hasLoggedInFacebook($password)
    {
        FacebookSession::setDefaultApplication('1628939997340252', '3c202c339b6e4c59b308ae62fcc86f5e');
        $isActive = false;
        $EncryptedAccessToken = self::getFileContents();
        $extendedPass = self::extendTo16Chars($password);
        $decryptedToken = self::decryptEncryptedAccessToken($EncryptedAccessToken,$extendedPass);
        $decryptedToken = 'CAAXJgyXm4lwBABZAJTTz4RZCrwDkZBMgGncTmNmfVbzWUp1FXIUaNbtEphbZBmUYPDlZByIkjGufim99c8obWdqV8ZBDxppJZCZBiqXfZBW3nZA9UaunpVIusKpD9IYdN3xqjZCZBZCrIhC6ZBzByLZBXafQZC97ZBDH6TnEwI4Vlrl9CUtKj5raWZC5ujxGhYMryDLjFU1WIZD';
        try
        {
            $session = new FacebookSession(preg_replace('@\x{FFFD}@u', '', $decryptedToken)); 
            $getInfoRequest = new FacebookRequest($session, 'GET', '/me?fields=id');
            $InfoResponse = $getInfoRequest->execute();
            $infoObject = $InfoResponse->getGraphObject();
            print_r($infoObject);
            $ID = $infoObject->getProperty('id');
            if ($ID!=null){$isActive = true;}
        } 
        catch (Exception $ex) {
        }
        return $isActive;
        
    }
    function decryptEncryptedAccessToken($EncryptedAccessToken, $password)
    {
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $password, base64_decode($EncryptedAccessToken), MCRYPT_MODE_ECB);
    }
    function encryptNewAccessToken($newToken,$password)
    {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $password, $newToken, MCRYPT_MODE_ECB));
    }
    
}