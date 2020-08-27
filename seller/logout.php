<?php
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["name"]);
unset($_SESSION["seller_id"]);

unset($_SESSION["seller_name"]);

session_destroy(); 

header("Location:../index.php");
?>