<?php
session_start();

if(empty($_SESSION['uid'])){
    Print '<script>alert("Login first to continue buying");</script>';
    header("Location:index.php");
  }

include "db.php";
if(isset($_POST['btn_buy']))
{
$buyer_id = $_SESSION["uid"];

$payment=$_POST['payment'];
$expdate=$_POST['expdate'];
$qty=$_POST['qty'];
$amount=$_POST['amount'];
$status=$_POST['status'];

            Print '<script>alert("Product buy on process, you will be notified once payment received!");</script>';
header("location: index.php"); 
mysqli_close($con);
}

?>