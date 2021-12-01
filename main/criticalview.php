<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<center><h4><i class="icon-list icon-small"></i>Critical Products</h4></center>

<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
                                                <thead>
                                                  <tr>
                                                    
                                                    <th width = "50%" > Product Code</th>
                                                    <th width = "50%" > Product Name </th>
                                                    <th width = "20%"> Category </th>
                                                    <th width = "30%" > Qty Left </th>
                                                    
                                                </thead>
                                                <tbody>
                                                  
                                                    <?php
                                                      include('../connect.php');
                                                      $result = $db->prepare("SELECT * FROM products where qty <=5 ORDER BY product_id DESC");
                                                      $result->execute();
                                                      for($i=0; $row = $result->fetch(); $i++){
                                                    ?>
                                                    <tr class="record">
                                                    <td><?php echo $row['product_code']; ?></td>
                                                    <td><?php echo $row['product_name']; ?></td>
                                                    <td><?php echo $row['gen_name']; ?></td>
                                                    <td><?php echo $row['qty']; ?></td>
                                                    <?php
                                                      }
                                                    ?>
                                                  </tbody>
                                              </table>