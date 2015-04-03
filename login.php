<?php
$username=$_POST["username"];
$password=$_POST["password"];

$protectedUser=md5($username);
$protectedPassword=md5($password);

setcookie($protectedUser, $protectedPassword);
header("Location: admin.php");
die();

?>