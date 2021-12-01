<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<center><h4><i class="icon-list icon-small"></i>Pending Reservation</h4></center>

<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
                                                <thead>
                                                  <tr>
                                                    
                                                    <th width = "46%" >Customer Name</th>
                                                    <th > Expected Date </th>
                                                    
                                                </thead>
                                                <tbody>
                                                  
                                                    <?php
                                                      include('../connect.php');
                                                      $result = $db->prepare("SELECT customer_name , expected_date FROM customer");
                                                      $result->execute();
                                                      for($i=0; $row = $result->fetch(); $i++){
                                                    ?>
                                                    <tr class="record">
                                                    <td><?php echo $row['customer_name']; ?></td>
                                                    <td><?php echo $row['expected_date']; ?></td>
                                                    
                                                    </tr>
                                                    <?php
                                                      }
                                                    ?>
                                                  </tbody>
                                              </table>