<?php
setcookie(md5("NHSExecutives"), "", time()-3600);
header("Location: index.php");
?>