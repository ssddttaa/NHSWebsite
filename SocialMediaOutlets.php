<?php
    require_once('codebird-php-develop/src/codebird.php');
 
    \Codebird\Codebird::setConsumerKey("xQLlqWFsObilU1omDlP32g80a", "yrppLlhpdmHbLv3wOjyTN3DHLa9L6AmZEShdWP2z68pySxw1rx");
    $cb = \Codebird\Codebird::getInstance();
    $cb->setToken("1485424604-aGwtCYnZzvax95Zksw7M3vSn4wfnx8gyO3ujfiy", "sAD8J6S5U4oX6i7GF89ShIPYPbFcqELMoYXnIN9ty65x5");

    $params = array(
      'status' => 'this might be sadat'
    );
    $reply = $cb->statuses_update($params); 
?>