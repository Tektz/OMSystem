<?php

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
   include_once "../db.php"; 
$p_id=$_GET['product_id'];

mysqli_query($con,"delete from product where product_id='$p_id'")or die("query is incorrect...");
header("location: admin_home.php#products");
}

?>
<div class="container-fluid col-sm-10">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter table-hover">
                    <thead class="text-primary">
                      <tr><th>ProductName</th>
                      <th>Description</th>                     
                      <th>Price</th>
                      <th>Action</th>
                    </tr></thead>
                    <tbody>
                    <?php 
                        $result=mysqli_query($con,"select product_id, product_name, product_desc, product_price from product")or die ("query 2 incorrect...");

                        while(list($p_id,$pname,$p_desc,$p_price)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$pname</td><td>$p_desc</td><td>$p_price</td>";

                        echo"<td>
                        <a href='editproduct.php?product_id=$p_id' type='button' rel='tooltip' title='' class='btn btn-info btn-link btn-sm' data-original-title='Edit Seller'>
                                <i class='material-icons'>Edit</i>
                              <div class='ripple-container'></div></a>
                        <a href='product_list.php?product_id=$p_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete Seller'>
                                <i class='material-icons'>Delete</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>";
                        }
                        
                        ?>
                    </tbody>
                  </table> 
    </div>
</div>