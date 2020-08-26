<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);
unset($_SESSION["admin_id"]);

unset($_SESSION["admin_name"]);

$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    header('Location: '.$BackToMyPage);
} else {
    header('Location: index.php'); // default page
}
   

?>
