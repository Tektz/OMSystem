<?php
include "header.php";

$p_id=$_REQUEST['product_id'];
$result=mysqli_query($con,"select product_id,product_name,product_desc, product_price, cat_id, brand_id, product_keywords from product where product_id='$p_id'")or die ("query 1 incorrect...");
list($p_id,$pname,$pdesc,$pprice,$cat,$brand, $pkeyword)=mysqli_fetch_array($result);

if(isset($_POST['btn_update'])) 
{
$pname=$_POST['pname'];
$pdesc=$_POST['pdesc'];
$pprice=$_POST['pprice'];
$cat=$_POST['cat'];
$pbrand=$_POST['pbrand'];
$pkeyword=$_POST['pkeyword'];

mysqli_query($con,"update product set product_name='$pname', product_desc='$pdesc', product_price='$pprice', cat_id='$cat', brand_id='$pbrand', product_keywords='$pkeyword' where product_id='$p_id'")or die("Query 2 is incorrect...");
echo '<script>alert("Product updated Successful!");</script>';
header("location: seller_home.php");
mysqli_close($con);
}
?>
      <div class="main main-raised">       
		<div class="section">
			<div class="container">
				<div class="row">
	<div id="aside" class="col-md-2" style="background:#3BBfff">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link active"  href="seller_home.php">Dashboard</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#orders">Order List</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#products">Product List</a></li>
        </ul>					
	</div>

	<div class="col-md-10">
  <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" href="seller_home.php">Home</a></li>
        </ul>	
        <div class="container-fluid">
        <h3 style="text-align:center">Manage Products</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">              
                  <input type="hidden" name="product_id" id="product_id" value="<?php echo $p_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Product name</label>
                        <input type="text" id="pname" name="pname"  class="form-control" value="<?php echo $pname; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" id="pdesc" name="pdesc" class="form-control" value="<?php echo $pdesc; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="number"  id="price" name="pprice" class="form-control" value="<?php echo $pprice; ?>">
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="cat">Cartegory</label>
                        <select class="form-control" name="cat" id="cat" required>
                           <option value="<?php echo $cat; ?>" selected>select brand</option>
                           <option value="1">Android</option>
                           <option value="2">iOS</option>
                           <option value="3">Windows</option>
                           <option value="4">Blackbery</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="brand">Brand</label>
                        <select class="form-control" name="pbrand" id="brand" required>
                          <option value="<?php echo $brand; ?>" selected>select brand</option>
                          <option value="1">Samsung</option>
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
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Keywords</label>
                        <input type="text" name="pkeyword" id="pkeyword" class="form-control" value="<?php echo $pkeyword; ?>">
                      </div>
                    </div>
               
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_update" name="btn_update" class="btn btn-fill btn-primary">Update</button>
              </div>
              </form>
        </div>
	</div>
	</div>
	</div>
	</div>
</div>
<?php
include "footer.php";
?>