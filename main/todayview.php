<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<center><h4><i class="icon-list icon-small"></i>Todays's Sales</h4></center>

<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
                                                <thead>
                                                  <tr>
                                                    
                                                    <th width = "46%" > Category</th>
                                                    <th > Product Sold </th>
                                                    
                                                </thead>
                                                <tbody>
                                                  
                                                    <?php
                                                      include('../connect.php');
                                                      $result = $db->prepare("SELECT gen_name, COUNT(*) FROM sales_order WHERE date=curdate() GROUP BY gen_name DESC");
                                                      $result->execute();
                                                      for($i=0; $row = $result->fetch(); $i++){


                                                        
                                                    ?>
                                                    <tr class="record">
                                                    <td><?php echo $row['gen_name']; ?></td>
                                                    <td><?php echo $row['COUNT(*)']; ?></td>
                                                    
                                                    </tr>
                                                    <?php
                                                      }
                                                    ?>
                                                  </tbody>
                                              </table>