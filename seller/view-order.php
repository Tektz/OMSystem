<?php
include "header.php";
include_once "../db.php";


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
        <h3 style="text-align:center">Order</h3>
        <div class="row">

            <div class="col-sm-6">
            <h4 style="text-align:center">Buyer Information</h4>
            <?php 
            $o_id=$_REQUEST['order_id'];

$result=mysqli_query($con,"select *from order_info where order_id=$o_id")or die ("query 2 incorrect...");
$row=mysqli_fetch_assoc($result);

?>
            <div class="form-group">
                <label >Name: </label>
                <label ><?php echo  $row["f_name"]?></label>
            </div>
            <div class="form-group">
                <label >Email: </label>
                <label ><?php echo  $row["email"]?></label>
            </div>
            <div class="form-group">
                <label >Address: </label>
                <label ><?php echo  $row["address"]?>, <?php echo  $row["city"]?></label>
            </div>
            <div class="form-group">
                <label >Order Status: </label>
                <label ><?php echo  $row["status"]?></label>
            </div>
            
<?php?>
            </div>
            <div class="col-sm-6">
            <h4 style="text-align:center">Product</h4>
            <?php 
            $o_id=$_REQUEST['order_id'];

$result=mysqli_query($con,"select *from order_products op join product p on op.product_id=p.product_id where op.order_id=$o_id")or die ("query 2 incorrect...");
$row=mysqli_fetch_assoc($result);

?>
            <div class="form-group">
                <label >Product Name: </label>
                <label ><?php echo  $row["product_name"]?></label>
            </div>
            <div class="form-group">
                <label >Quantity: </label>
                <label ><?php echo  $row["qty"]?></label>
            </div>
            <div class="form-group">
                <label >Total Amount: </label>
                <label ><?php echo  $row["amount"]?></label>
            </div>

<?php?>
            </div>

        </div>

       
        </div>
	</div>
	</div>
	</div>
	</div>
</div>
<?php
include "footer.php";
?>