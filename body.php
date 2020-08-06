  <div class="main main-raised">
		
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">New</a></li>
									<li><a data-toggle="tab" href="#tab1">All</a></li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Products tab -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1" >
<?php
                    include 'db.php';
					$product_query = "SELECT * FROM product a,categories b WHERE a.cat_id=b.cat_id";
                $run_query = mysqli_query($con,$product_query)or die( mysqli_error($con));
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['product_id'];
                        $pro_cat   = $row['cat_id'];
                        $pro_brand = $row['brand_id'];
                        $pro_title = $row['product_name'];
                        $pro_price = $row['product_price'];
                        $pro_image = $row['product_image'];
                        $cat_name = $row["cat_name"];

                        echo "  
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>Tsh 870,000</del></h4>	
										<div class='btn-group' style='margin-left: 25px; margin-top: 15px'>
								        <a href='test.php?id=".$row['product_id']."' class='btn btn-fill btn-primary' pid='".$row['product_id']."' type='submit' id='btn_buy' name='btn_buy'>Add to Cart</a>
                                        </div>								
									</div>						
								</div>         
			";
		}
        ; 
}
?>
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab  -->
				</div>
			</div>
		</div>
		<!-- /SECTION New products -->

		<!-- SECTION TOP SELLING-->
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Top selling</a></li>
									<li><a data-toggle="tab" href="#tab2">All</a></li>
								</ul>
							</div>
						</div>
					</div>

					<!--  Top selling Products tab -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs">
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
				<?php
                    include 'db.php';
					$product_query = "SELECT * FROM product a,categories b WHERE a.cat_id=b.cat_id";
                $run_query = mysqli_query($con,$product_query)or die( mysqli_error($con));
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['product_id'];
                        $pro_cat   = $row['cat_id'];
                        $pro_brand = $row['brand_id'];
                        $pro_title = $row['product_name'];
                        $pro_price = $row['product_price'];
                        $pro_image = $row['product_image'];
                        $cat_name = $row["cat_name"];

                        echo "  
								<div class='product'>
									<a href='product.php?p=$pro_id'><div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>Tsh 870,000</del></h4>	
										<div class='btn-group' style='margin-left: 25px; margin-top: 15px'>
								        <a href='test.php?id=".$row['product_id']."' class='btn btn-fill btn-primary' pid='".$row['product_id']."' type='submit' id='btn_buy' name='btn_buy'>Add to Cart</a>
                                        </div>								
									</div>						
								</div>         
			";
		}
        ; 
}
?>

									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Top Selling Products tab  -->

				</div>
			</div>
		</div>
		<!-- /SECTION TOP SELLING-->
</div>		