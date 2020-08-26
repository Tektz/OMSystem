<?php
session_start();
include "../db.php";

if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = $_POST["password"];
	$sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
	$run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);

    	if($count == 1){
            $row = mysqli_fetch_array($run_query);
            $_SESSION["admin_id"] = $row["admin_id"];
            $_SESSION["admin_name"] = $row["admin_username"];
                echo "login_success";

                echo "<script> location.href='admin_home.php'; </script>";
                exit;

        }else{
                Print '<script>alert("Incorrect Password! see your Admin for login Details");</script>';
                echo "<script> location.href='login.php'; </script>";
                exit();
            }
}

mysqli_close($con);
?>