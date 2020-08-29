<?php
include_once "../db.php";
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];
mysqli_query($con,"delete from order_info where order_id='$order_id'")or die("query is incorrect...");
header("location: seller_home.php#orders");
}
if(isset($_POST['edit'])) {
  $order_id=$_POST['order_id'];
  $status=$_POST['status'];
  $ref_url =isset($_POST['ref_url'])?base64_decode($_POST['ref_url']):'';
  mysqli_query($con,"UPDATE order_info SET status ='$status' WHERE order_id='$order_id' ")or die($con);
}

?>
        <div class="container-fluid col-sm-10">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter">
                    <thead class="text-primary">
                      <tr><th>ID</th><th>Customer Name</th><th>Expire Date</th><th>Quantity</th><th>Total Amount</th><th>Status</th><th>Action</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select order_id, f_name, expdate, prod_count, total_amt, status from order_info a, seller b where a.seller_id = b.seller_id ")or die( mysqli_error($con));

                        while(list($order_id,$cus_name,$exp_date,$qty,$t_amount,$status)=mysqli_fetch_array($result))
                        {	
                          ?>
                        <tr><td><?php echo $order_id ?></td><td><?php echo $cus_name ?></td><td><?php echo $exp_date ?></td><td><?php echo $qty ?></td><td><?php echo $t_amount ?></td>
                        <td>
                        <form method="post" action="">
                      <input type="hidden" name="order_id" value="<?php echo $order_id?>">
                          <select class='input input-borders' name='status' >
                            <option value='<?php echo  $status?>'><?php echo  $status?> </option>
                            <option value='Pending'>Pending </option>
                            <option value='Refunded'>Refunded  </option>
                            <option value='Cancelled'>Cancelled </option>
                            <option value='Declined'>Declined </option>
                            <option value='Completed'>Completed </option>
                          </select>
                         
                        </td>
                        <td>
                        <input class="btn btn-info"  value="Save" type="submit" name="edit">
                        <a href='view-order.php?order_id=<?php echo $order_id ?>' type='button'  class='btn btn-info' >
                                <i class='material-icons'>View</i></a>
                        </form>
                        </td>
                        </tr>

                      <?php
                        }
                        ?>
                    </tbody>
                  </table> 
                  </div>
        </div>