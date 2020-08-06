
        <div class="container-fluid">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter">
                    <thead class="text-primary">
                      <tr><th>ID</th><th>Customer Name</th><th>Payment</th><th>Expire Date</th><th>Quantity</th><th>Total Amount</th><th>Status</th><th>Action</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select order_id, f_name, expdate, prod_count, total_amt, status from order_info a, buyer b where a.buyer_id=b.buyer_id")or die( mysqli_error($con));

                        while(list($order_id,$cus_name,$exp_date,$qty,$t_amount,$status)=mysqli_fetch_array($result))
                        {	
                        echo "<tr><td>$order_id</td><td>$cus_name</td><td></td><td>$exp_date</td><td>$qty</td><td>$t_amount</td><td>$status</td>
                        <td>
                        <a class=' btn btn-danger' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
                        </td></tr>";
                        }
                        ?>
                    </tbody>
                  </table> 
                  </div>
        </div>