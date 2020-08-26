<?php

if(isset($_POST['btn_add']))
{
$f_name=$_POST['fname'];
$l_name=$_POST['lname'];
$email=$_POST['email'];
$mobile=$_POST['phone'];
$address=$_POST['address'];
$password=$_POST['password'];

mysqli_query($con,"insert into seller(fname,lname,email,phone,address,password) values ('$f_name','$l_name','$email','$mobile','$address','$password')") 
            or die ("Query 1 is incorrect...");
            Print '<script>alert("Seller added Successful!");</script>';
mysqli_close($con);
}

?>
<div class="modal-content center" >
    <div class="modal-header">
     <font style="font-style:normal; font-size: 24px; color: #000;font-family: serif">
       Seller Registration Form
    </font>	
    </div>
    <div class="modal-body">
    <div class="container-fluid">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  type="form" name="form" enctype="multipart/form-data">
			 <div class="billing-details jumbotron">
                <div class="form-group">
                 <label for="name">First Name</label>
                 <input class="input input-borders" type="text" name="fname" placeholder="First Name" id="name" required>
                </div>
               <div class="form-group">
               <label for="name">Last Name</label>
               <input class="input input-borders" type="text" name="lname" placeholder="Last Name" id="name" required>
                </div>
                <div class="form-group">
               <label for="email">Email</label>
               <input class="input input-borders" type="email" name="email" placeholder="Email" id="name" required>
                </div>
                <div class="form-group">
               <label for="name">Phone</label>
               <input class="input input-borders" type="number" name="phone" placeholder="Phone No" id="name" required>
                </div>
                <div class="form-group">
               <label for="name">Address</label>
               <input class="input input-borders" type="text" name="address" placeholder="Address" id="name">
                </div>
                <div class="form-group">
               <label for="name">Password</label>
               <input class="input input-borders" type="password" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                <button class="btn btn-fill btn-primary" type="submit" id="btn_add" name="btn_add">Add Seller</button>
                </div>
</br>
             </div>
            </form>
    </div>
     </div>                            
 </div> 