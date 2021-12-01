<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<center>
  <h4><i class="icon-list icon-small"></i>Expiring Products</h4>
</center>

<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
                                                <thead>

                                                    

                                                  <tr>
                                                    <th>Status</th>
                                                    <th width = "50%" > Product Code</th>
                                                    <th width = "50%" > Product Name </th>
                                                    <th width = "20%"> Qty Left </th>
                                                    <th width = "70%" > Expiry Date </th>
                                                    
                                                </thead>
                                                <tbody>

                                                  <?php
                                                      include('../connect.php');
                                                      $result = $db->prepare("SELECT * FROM products WHERE expiry_date <=curdate() + interval 3 day");
                                                      $result->execute();
                                                      for($i=0; $row = $result->fetch(); $i++){
                                                        $datenow = date('Y-m-d'); 
                                                        
                                                        $expiry = $datenow;
                                                        $expired=$row['expiry_date'];
                                                        if ($expired <= $expiry ) {
                                                        echo '<tr class="alert alert-warning record" style="color: #fff; background:black;">';
                                                        echo '<td> Expired </td>';
                                                           }

                                                           else {
                                                      echo '<tr class="record">';
                                                      echo '<td>Expiring</td>';
                                                      }
                                                    ?>

                                                    <td><?php echo $row['product_code']; ?></td>
                                                    <td><?php echo $row['product_name']; ?></td>
                                                    <td><?php echo $row['qty']; ?></td>
                                                    <?php
                                                      $date = DateTime::createFromFormat('Y-m-d', $row["expiry_date"]);
                                                      ?>

                                                    <td><?php echo htmlspecialchars($date->format('F d, Y'));?></td>

                                                    
                                                    </tr>
                                                    <?php
                                                      }
                                                    ?>
                                                  </tbody>
                                              </table>


                                            

