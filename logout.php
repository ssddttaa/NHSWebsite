<?php
setcookie($protectedUser, "", time()-3600);
header("Location: index.php");
?>