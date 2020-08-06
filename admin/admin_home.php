<?php
include "header.php";
?>
      <div class="main main-raised">       
		<div class="section">
			<div class="container">
				<div class="row">
	<div id="aside" class="col-md-2" style="background:#3BBfff">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Dashboard</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#orders">Order List</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#products">Product List</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#customers">Customer List</a></li>
        </ul>					
	</div>

	<div class="col-md-10">
  <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#orders">Order List</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#products">Product List</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#customers">Customer List</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sellers">Seller List</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#AddProduct">Add Product</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#AddSeller">Add Seller</a></li>
        </ul>	
  <div class="tab-content">
    <div class="tab-pane container active" id="home">
    <h3 style="text-align:center">Home - Orders</h3>
        <?php include "orders.php"; ?>
    </div>
    <div class="tab-pane container fade" id="orders">
    <h3 style="text-align:center">Orders List</h3>
      <?php include "orders.php"; ?>
    </div>
    <div class="tab-pane container fade" id="products">
    <h3 style="text-align:center">Products List</h3>
    <?php include "product_list.php" ?>
    </div>
    <div class="tab-pane container fade" id="customers">
    <h3 style="text-align:center">Customer List</h3>
    <?php include "customer_list.php"; ?>
    </div>
    <div class="tab-pane container fade" id="sellers">
    <h3 style="text-align:center">Sellers List</h3>
    <?php include "seller_list.php"; ?>
    </div>
    <div class="tab-pane container fade" id="AddProduct">
    </br>
    <?php include "addproduct.php"; ?>
    </div>
    <div class="tab-pane container fade" id="AddSeller">
   </br>
    <?php include "addseller.php"; ?>
    
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