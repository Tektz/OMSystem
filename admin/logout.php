<?php
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["name"]);
unset($_SESSION["admin_id"]);

unset($_SESSION["admin_name"]);

session_destroy(); 

header("Location:../index.php");
?>