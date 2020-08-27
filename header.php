<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Online Mobilephone Shop _OMS</title>

		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>

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
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">					
					<ul class="header-links pull-right">
						<li><?php
                             include "db.php";
                            if(isset($_SESSION["uid"])){
                                $sql = "SELECT fname FROM buyer  WHERE buyer_id='$_SESSION[uid]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);
                                echo '
                               <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Welcome: '.$row["fname"].'</a>
                                  <div class="dropdownn-content">
                                    <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                  </div>
                                </div>';
                            }else if(isset($_SESSION["admin_id"])){
                              $sql = "SELECT admin_username FROM admin_info  WHERE admin_id='$_SESSION[admin_id]'";
                              $query = mysqli_query($con,$sql);
                              $row=mysqli_fetch_array($query);
                              echo '
                             <div class="dropdownn">
                                <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Welcome: '.$row["admin_username"].'</a>
                                <div class="dropdownn-content">
                                  <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                </div>
                              </div>';
                            }
                            else if(isset($_SESSION["seller_id"])){
                              $sql = "SELECT fname FROM seller  WHERE seller_id='$_SESSION[seller_id]'";
                              $query = mysqli_query($con,$sql);
                              $row=mysqli_fetch_array($query);
                              echo '
                             <div class="dropdownn">
                                <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Welcome: '.$row["fname"].'</a>
                                <div class="dropdownn-content">
                                  <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                </div>
                              </div>';
                            }
                            else{ 
                                echo '
                                <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> My Account</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Login</a>
                                    <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>                         
                                  </div>
                                </div>';             
                            }
                                             ?>
                                </li>				
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
								<font style="font-style:normal; font-size: 24px;color: aliceblue;font-family: serif">
                                        Online Mobilephone Shop
                                    </font>	
								</a>
							</div>
						</div>



						<!-- <div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Android</option>
										<option value="2">iOS</option>
										<option value="3">Windows</option>
									</select>
									<input class="input" id="search" type="text" placeholder="Search here" disabled>
									<button type="submit" id="search_btn" class="search-btn">Search</button>
								</form>
							</div>
						</div> -->
						<div class="col-md-3 clearfix " style="float:right">
							<div class="header-ctn">
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="badge qty">0</div>
									</a>
									<div class="cart-dropdown"  >
										<div class="cart-list" id="cart_product">
										
											
										</div>
										<div class="cart-btns">
												<a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i> edit cart</a>
										</div>
									</div>		
									</div>
								<!-- /Cart -->
							</div>
						</div>
					</div>					
				</div>				
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<nav id='navigation'>			
            <div class="container" id="get_category_home">
                
            </div>
		</nav>
            
		<!-- FORM MODEL-->
		<div class="modal fade" id="Modal_login" role="dialog">
                        <div class="modal-dialog">												
                          
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                            <?php
                                include "login_form.php";
                            ?>
                            </div>                            
                          </div>													
                        </div>
        </div>
         <div class="modal fade" id="Modal_register" role="dialog">
                        <div class="modal-dialog" style="">

                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                            <?php
                                include "register_form.php";
                            ?>
                            </div> 
                          </div>

                        </div>
        </div>		