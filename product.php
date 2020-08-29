<?php
include "header.php";
?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<script>
    (function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            e.stopPropagation();
        };		
    };
})(window);
</script>
		<div class="section main main-raised">
			<div class="container">
				<div class="row">
					<!-- Product main img -->
					<?php 
								include 'db.php';
								$product_id = $_GET['p'];
								
								$sql = " SELECT * FROM product WHERE product_id = $product_id";
								if (!$con) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($con, $sql);
								if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
										$dis= ($row['product_price'] *0.1)+$row['product_price'];

									echo '
                                <div class="col-md-5 col-md-push-2">
                                <div id="product-main-img">
                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>
                                </div>
                            </div>
                                
                                <div class="col-md-2  col-md-pull-5">
                                <div id="product-imgs">
                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'g" alt="">
                                    </div>

                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>
                                </div>
                            </div>
									';
		
									echo '
              
                    <div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">'.$row['product_name'].'</h2>
							<div>
								product infor
							</div>
							<div>
								<h3 class="product-price">Tsh '.$row['product_price'].'<del class="product-old-price">'.$dis.'</del></h3>
								<span class="product-available">In Stock</span>
							</div>

								<div class="btn-group" style="margin-left: 25px; margin-top: 15px">
								<a href="test.php?id='.$row['product_id'].'" class="btn btn-fill btn-primary" pid="'.$row['product_id'].'" type="submit" id="btn_buy" name="btn_buy">Add to Cart</a>
                                </div>	

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Section -->
		<div class="section main main-raised">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>
                    ';
									$_SESSION['product_id'] = $row['product_id'];
									}
								} 
								?>	
								<?php
                    include 'db.php';
					$product_id = $_GET['p']; 
					$product_query = "SELECT * FROM product a,categories b WHERE a.cat_id=b.cat_id AND product_id BETWEEN $product_id AND $product_id+3";
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

                        echo "
                                <div class='col-md-3 col-xs-6'>
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
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>Tsh 780,000</del></h4>
										<div class='btn-group' style='margin-left: 25px; margin-top: 15px'>
								        <a href='test.php?id=".$row['product_id']."' class='btn btn-fill btn-primary' pid='".$row['product_id']."' type='submit' id='btn_buy' name='btn_buy'>Add to Cart</a>
                                        </div>
									</div>
								</div>
                                </div>                        
			";
		}
        ; 
}
?>
				</div>              
			</div>
		</div>
<?php
include "footer.php";
?>