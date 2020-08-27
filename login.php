<?php
include "db.php";

session_start();

if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$ref_url =isset($_POST['ref_url'])?base64_decode($_POST['ref_url']):'';
	$password = $_POST["password"];
	$sql = "SELECT * FROM buyer WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
    $row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["buyer_id"];
		$_SESSION["name"] = $row["fname"];
		$ip_add = getenv("REMOTE_ADDR");
		
	if($count == 1){
		if(isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) { 
					$verify_cart = "SELECT cart_id FROM cart WHERE buyer_id = $_SESSION[uid] AND p_id = ".$product_list[$i];
					$result  = mysqli_query($con,$verify_cart);
					if(mysqli_num_rows($result) < 1){
						$update_cart = "UPDATE cart SET buyer_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND buyer_id = -1";
						mysqli_query($con,$update_cart);
					}else{
						$delete_existing_product = "DELETE FROM cart WHERE buyer_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i];
						mysqli_query($con,$delete_existing_product);
					}
		        }
				setcookie("product_list","",strtotime("-1 day"),"/");
				echo "cart_login";

				exit();
		    }
			echo "login_success";
			
				if(!empty($ref_url)) {
					header("Location: $ref_url ");
					
				} else {
					header('Location: index.php'); 
				} 
				
            exit;

	}
	
		else{
			$email = mysqli_real_escape_string($con,$_POST["email"]);
			$password =$_POST["password"];
			$sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);

		if($count == 1){
			$row = mysqli_fetch_array($run_query);
			$_SESSION["admin_id"] = $row["admin_id"];
			$_SESSION["admin_name"] = $row["admin_username"];
			$ip_add = getenv("REMOTE_ADDR");
		   
				echo "login_success";

				echo "<script> location.href='admin/admin_home.php'; </script>";
				exit;

		}else{
			$email = mysqli_real_escape_string($con,$_POST["email"]);
			$password =$_POST["password"];
			$sql = "SELECT * FROM seller WHERE email = '$email' AND password = '$password'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);

		if($count == 1){
			$row = mysqli_fetch_array($run_query);
			$_SESSION["seller_id"] = $row["seller_id"];
			$_SESSION["seller_name"] = $row["fname"];
			$ip_add = getenv("REMOTE_ADDR");
		   
				echo "login_success";

				echo "<script> location.href='seller/seller_home.php'; </script>";
				exit;

		}else{
				echo "<span style='color:red;'>Please register before login or see your Admin for login Details</span>";
				exit();
			}
			}
	}		
}
?>