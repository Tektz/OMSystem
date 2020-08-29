<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["categoryhome"])){
	$category_query = "SELECT * FROM categories";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
				<!-- responsive-nav -->
				<div id='responsive-nav'>
					<!-- NAV -->
					<ul class='main-nav nav navbar-nav'>
                    <li class='active'><a href='index.php'>Home</a></li>
                    <li><a href='store.php'>Smartphones</a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_name"];
            
            $sql = "SELECT COUNT(*) AS count_items FROM product a,categories b WHERE a.cat_id=b.cat_id";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
			echo "
        
                               <li class='categoryhome' cid='$cid'><a href='store.php'>$cat_name</a></li>
         
			";
		}
        
		echo "</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
               
			";
	}
}


if(isset($_POST["page"])){
	$sql = "SELECT * FROM product";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/2);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page'>$i</a></li>
            
            
		";
	}
}
if(isset($_POST["getProducthome"])){
	$limit = 3;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM product a,categories b WHERE a.cat_id=b.cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['cat_id'];
			$pro_brand = $row['brand_id'];
			$pro_title = $row['product_name'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];           
			$cat_name = $row["cat_name"];
			$dis= ($pro_price *0.1)+$pro_price;

			echo "	
                       <div class='product-widget'>
                                <a href='product.php?p=$pro_id'> 
									<div class='product-img'>
										<img src='product_images/$pro_image' alt=''>
									</div>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price'>$pro_price<del class='product-old-price'>Tsh $dis</del></h4>
									</div></a>
								</div>           
			";
		}
	}
}
if(isset($_POST["gethomeProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
    
	$product_query = "SELECT * FROM product a,categories b WHERE a.cat_id=b.cat_id AND product_id BETWEEN 4 AND 10";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
        
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['cat_id'];
			$pro_brand = $row['brand_id'];
			$pro_title = $row['product_name'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];           
			$cat_name = $row["cat_name"];
			$dis= ($pro_price *0.1)+$pro_price;

            
			echo "
								<div class='col-md-3 col-xs-6'>
								<form method='post' action='homeaction.php?action=add&code=<?php echo $product_array[$key]['code']; ?>'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$dis</del></h4>
										<div>
										<a href='test.php?id=".$row['product_id']."' class='btn btn-fill btn-primary' pid='".$row['product_id']."' type='submit' id='btn_buy' name='btn_buy'>Add to Cart</a>
										<div class='cart-action'><input type='text' class='product-quantity' name='quantity' value='1' size='2' /><input type='submit' value='Add to Cart' class='btnAddAction' /></div>
									    </div>
									</div>									
								</div>
                                </form>
                                </div>          
			";
		}
        ;  
}  
	} 
if(isset($_POST["get_seleted_Category"]) ||  isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM product a,categories b WHERE a.cat_id = '$id' AND a.cat_id=b.cat_id";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM product a,categories b WHERE a.cat_id=b.cat_id AND a.product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['cat_id'];
			$pro_brand = $row['brand_id'];
			$pro_title = $row['product_name'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$cat_name = $row["cat_name"];
			$dis= ($pro_price *0.1)+$pro_price;

			echo "
                        <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>									
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>Tsh $dis</del></h4>
										<div>
										<a href='test.php?id=".$row['product_id']."' class='btn btn-fill btn-primary' pid='".$row['product_id']."' type='submit' id='btn_buy' name='btn_buy'>Add to Cart</a>
									</div>
									</div>									
								</div>
							</div>
			";
		}
	}