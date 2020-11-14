<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$_SESSION = array();
session_destroy();
header("location: login.php");

?>