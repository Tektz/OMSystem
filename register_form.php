    <div class="wait overlay">
        <div class="loader"></div>
    </div>
    <style>
    .input-borders{
        border-radius:30px;
    }
    </style>
                <div class="container-fluid">
								<form id="signup_form" action="register.php" method="POST" class="login100-form">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                        <h2 class="login100-form-title p-b-49" >Register Here</h2>
                                    </div>
                                    <div class="form-group ">
                                    
                                        <input class="input form-control input-borders" type="text" pattern="^[a-zA-Z ]+$" name="f_name" id="f_name" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                    
                                        <input class="input form-control input-borders" type="text" pattern="^[a-zA-Z ]+$" name="l_name" id="l_name" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="email" name="email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}" placeholder="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="repassword" id="repassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,}" placeholder="confirm password" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="tel" name="phone" id="mobile" pattern="^[0-9]{10}$" placeholder="phone number" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" pattern="^[a-zA-Z ]+$" name="address" id="address" placeholder="Address" required>
                                    </div>                                   
                                    <div style="form-group">
                                       <input class="primary-btn btn-block"  value="Sign Up" type="submit" name="signup_button">
                                    </div>
                                    <div class="text-pad">
                                    <a href="" data-toggle="modal" data-target="#Modal_login">Already have an Account ? login here</a>
                                       
                                    </div>
								</form>
                                <div class="login-marg">
						<!-- Billing Details -->
						<div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" id="signup_msg">
                                    

                                </div>
                                <!--Alert from signup form-->
                            </div>
                            <div class="col-md-2"></div>
                        </div>	
					</div>
                    </div> 