<?php
session_start();

if(empty($_SESSION['admin_name'])){
  header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online Mobilephone Shop - OMS Admin Login</title>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="../css/style.css"/>
		<link type="text/css" rel="stylesheet" href="../css/accountbtn.css"/>

    <style>
        #navigation {
          background: #DDDEE0; 
        }
        #header {
            background: #3BBDEA; 
        }
        #top-header {
            background: #3BBfff;
        }
        #footer {
            background: #3BBDEA;
            color: #1E1F29;
        }
        .body{
            background: #FFFFFF;
        }
        .center{
            margin: auto;
            width: 50%;
            padding: 2px;
        }
        .primary-btn{
            display: inline-block;
            float:right
        }
        .footer-links li a {
          color: #1E1F29;
        }
        .mainn-raised {
            margin: -7px 0px 0px;
            border-radius: 6px;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
        }
        </style>

    </head>
	<body class="body">
    <header>
			<div id="top-header">
				<div class="container">					
					<ul class="header-links pull-right">			
						<li><?php
                             include "../db.php";
                            if(isset($_SESSION["admin_id"])){
                                $sql = "SELECT admin_username FROM admin_info WHERE admin_id='$_SESSION[admin_id]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                echo '
                               <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Welcome: '.$row["admin_username"].'</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#profile"><i class="fa fa-user-circle" aria-hidden="true" ></i>My Profile</a>
                                    <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                  </div>
                                </div>';
                            }else{ 
                                echo '
                                <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> My Account</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Login</a>                       
                                  </div>
                                </div>';             
                            }
                                             ?>
                                </li>				
					</ul>
				</div>
			</div>

			<div id="header">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="header-logo">
								<a href="#" class="logo">
								<font style="font-style:normal; font-size: 32px;color: aliceblue;font-family: serif">
                                        Online Mobilephone Shop
                                    </font>	
								</a>
							</div>
						</div>
					</div>					
				</div>				
			</div>
		</header>
