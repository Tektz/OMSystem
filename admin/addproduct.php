<?php
 if(isset($_POST['btn_save']))
 {
 $pname=$_POST['pname'];
 $pdesc=$_POST['pdescription'];
 $price=$_POST['pprice'];
 $pcat=$_POST['pcat'];
 $pbrand=$_POST['pbrand'];
 $seller_id=$_POST['seller'];
 $pkeyword=$_POST['pkeyword'];
 
 $picture_name=$_FILES['picture']['name'];
 $picture_type=$_FILES['picture']['type'];
 $picture_tmp_name=$_FILES['picture']['tmp_name'];
 $picture_size=$_FILES['picture']['size'];
 
 if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
 {
     if($picture_size<=50000000)
     
         $pic_name=time()."_".$picture_name;
         move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
         
 mysqli_query($con,"insert into product (product_name, product_desc,product_image,product_price,seller_id, cat_id,brand_id, product_keywords) 
 values ('$pname','$pdesc','$pic_name','$price','$seller_id','$pcat','$pbrand','$pkeyword')") or die ("query incorrect");

  Print '<script>alert("Product added Successful!");</script>';
  
 }
 
 mysqli_close($con);
 } 
?>
<div class="modal-content center" >
    <div class="modal-header">
     <font style="font-style:normal; font-size: 24px; color: #000;font-family: serif">
       Product Form
    </font>	
    </div>
    <div class="modal-body">
    <div class="container-fluid">
			<form action="" method="post" type="form" name="form" enctype="multipart/form-data">
			 <div class="billing-details jumbotron">
                <div class="form-group">
                 <label for="name">Product Name</label>
                 <input class="input input-borders" type="text" name="pname" pattern="^[a-zA-Z ]+$" placeholder="Product Name" id="name" required>
                </div>
               <div class="form-group">
               <label for="name">Description</label>
               <input class="input input-borders" type="text" name="pdescription" placeholder="Description" id="name" required>
                </div>
                <div class="form-group">
               <label for="name">Image</label>
               <input class="input input-borders" type="file" name="picture" placeholder="Image" id="name" required>
                </div>
                <div class="form-group">
               <label for="name">Price</label>
               <input class="input input-borders" type="number" name="pprice" pattern="^[0-9]{7}$" placeholder="Price" id="name" required>
                </div>
<div class="form-group">
  <label for="cat">Category</label>
  <select class="form-control" name="pcat" id="cat">
    <option value="1" selected>Android</option>
    <option value="2">iOS</option>
    <option value="3">Windows</option>
    <option value="4">Blackbery</option>
  </select>
</div>
<div class="form-group">
  <label for="cat">Brand</label>
  <select class="form-control" name="pbrand" id="brand">
    <option value="1" selected>Samsung</option>
    <option value="2">Oppo</option>
    <option value="3">iPhone</option>
    <option value="4">MI</option>
    <option value="5">Techno</option>
    <option value="6">Huawei</option>
    <option value="7">Nokia</option>
    <option value="8">Xhaomi</option>
    <option value="9">Blackberry</option>
  </select>
</div>

<div class="form-group">

  <label for="seller">Seller</label>
  <select class="form-control" name="seller" id="seller">
 
    <option value="0" selected>Select Seller Name</option>
    <?php 
$result=mysqli_query($con,"select *from seller")or die ("query 2 incorrect...");
while($row=mysqli_fetch_assoc($result))
{?>
    <option value="<?php echo  $row["seller_id"]?>"><?php echo  $row["fname"]?> <?php echo  $row["lname"]?></option>
    <?php
}
?>
  </select>
</div>

                <div class="form-group">
               <label for="name">Keywords</label>
               <input class="input input-borders" type="text" name="pkeyword" placeholder="Keywords" id="name">
                </div>
                <div class="form-group">
                <button class="btn btn-fill btn-primary" type="submit" id="btn_save" name="btn_save">Save Product</button>
                </div>
</br>
             </div>
            </form>
    </div>
     </div>                            
 </div> 