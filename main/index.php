<?php
	require_once('auth.php');
?>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>

<?php include 'header.php'; ?>
<?php include('navfixed.php');?>
<?php include 'sidebar.php'; ?>


    <div style="margin-left: 200px" class="container-fluid">
      <div class="row-fluid">
	
	<div class="contentheader">
			<i class="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<li class="active">Dashboard</li>
			</ul>
			
			
<div id="mainmain">

<!-- Start Content-->
                    <div class="container-fluid">

                      <?php
                          include('../connect.php');
                          $result1 = $db->prepare("SELECT COUNT(DISTINCT invoice) FROM sales_order WHERE date=curdate() - interval 1 day");
                          $result1->execute();
                          for($i=0; $row = $result1->fetch(); $i++){
                          ?>

                        <div class="row">
                                <div class="card tilebox-one" style="margin-left: 0px;">
                                    <div class="card-body" style="  width: 250px;
                                                                    padding: 10px;
                                                                    border-radius: 20px;
                                                                    background-color: lightblue;
                                                                    border: 5px  lightgray;
                                                                    margin: 0;">
                                        <h4 class="text-uppercase mt-0">Yesterday's Sales</h4>
                                        <h2 class="my-2"><?php echo $row['COUNT(DISTINCT invoice)']; ?></h2>
                                        <?php
                                             } 
                                         ?>
                                    </div> <!-- end card-body-->
                                </div>
                                <!--end card-->

                                <?php
                                    include('../connect.php');
                                    $result2 = $db->prepare("SELECT COUNT(DISTINCT invoice) FROM sales_order WHERE date=curdate()");
                                    $result2->execute();
                                    for($i=0; $row = $result2->fetch(); $i++){
                                    ?>

                                <div class="card tilebox-one" style="margin-top: -110px;
                                                                    margin-left: 350px">
                                    <div class="card-body" style="  width: 250px;
                                                                    padding: 10px;
                                                                    border-radius: 20px;
                                                                    background-color: lightblue;
                                                                    border: 5px  lightgray;
                                                                    margin: 0;">
                                        <h4 class="text-uppercase mt-0">Today's Sales</h4>
                                        <h2 class="my-2" ><?php echo $row['COUNT(DISTINCT invoice)']; ?></h2>
                                        <?php
                                             }
                                         ?>
                                        
                                    </div> <!-- end card-body-->
                                </div>
                                <!--end card--> 


                                <?php
                                    include('../connect.php');
                                    $result3 = $db->prepare("SELECT customer_id, COUNT(*) FROM customer WHERE status = 'Pending'");
                                    $result3->execute();
                                    for($i=0; $row = $result3->fetch(); $i++){
                                    ?>

                                <div class="card tilebox-one" style="margin-top: -110px; margin-left: 700px;">
                                    <div class="card-body" style="  width: 250px;
                                                                    padding: 10px;
                                                                    border-radius: 20px;
                                                                    background-color: lightblue;
                                                                    border: 5px  lightgray;
                                                                    margin: 0;">
                                        <h4 class="text-uppercase mt-0">Pending Reservations</h4>
                                        <h2 class="my-2" ><?php echo $row['COUNT(*)']; ?></h2>
                                        <?php
                                             }
                                         ?>
                                        
                                    </div> <!-- end card-body-->
                                </div>
                                <!--end card-->       
                        <br><br>

                          <center>
                            <div class="col-xl-9 col-lg-8">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                       
                                        
                                        <h2 class="header-title mb-3">Top Customers</h2>

                                        <div dir="ltr">
                                            <div ><table class="table table-borderless"  data-responsive="table" style="text-align: left;">
                                                <thead>
                                                  <tr>
                                                    
                                                    <th width = "46%" > Customer </th>
                                                    <th  > No. of Purchase </th>
                                                    
                                                </thead>
                                                <tbody>
                                                  
                                                    <?php
                                                      include('../connect.php');
                                                      $result = $db->prepare("SELECT name, COUNT(*) FROM sales GROUP BY name ORDER BY COUNT(*) DESC LIMIT 10");
                                                      $result->execute();
                                                      for($i=0; $row = $result->fetch(); $i++){
                                                    ?>
                                                    <tr class="record">
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['COUNT(*)']; ?></td>
                                                    
                                                    </tr>
                                                    <?php
                                                      }
                                                    ?>
                                                  </tbody>
                                              </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                        </div>

                        <br><br>

                            <div class="col-xl-9 col-lg-8">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                       
                                        
                                        <h2 class="header-title mb-3">Top Sold Products</h2>

                                        <div dir="ltr">
                                            <div ><table class="table table-borderless"  data-responsive="table" style="text-align: left;">
                                                <thead>
                                                  <tr>
                                                    
                                                    <th width = "46%" > Product</th>
                                                    <th > No. of Sale </th>
                                                    
                                                </thead>
                                                <tbody>
                                                  
                                                    <?php
                                                      include('../connect.php');
                                                      $result = $db->prepare("SELECT name, COUNT(*) FROM sales_order GROUP BY name ORDER BY COUNT(*) DESC LIMIT 10");
                                                      $result->execute();
                                                      for($i=0; $row = $result->fetch(); $i++){
                                                    ?>
                                                    <tr class="record">
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['COUNT(*)']; ?></td>
                                                    
                                                    </tr>
                                                    <?php
                                                      }
                                                    ?>
                                                  </tbody>
                                              </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                        </div>

                        <br><br>

                            <div class="col-xl-9 col-lg-8">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                       
                                        
                                        <h2 class="header-title mb-3">Top Sales Categories</h2>

                                        <div dir="ltr">
                                            <div ><table class="table table-borderless"  data-responsive="table" style="text-align: left;">
                                                <thead>
                                                  <tr>
                                                    
                                                    <th width = "46%" > Category</th>
                                                    <th > Product Sold </th>
                                                    
                                                </thead>
                                                <tbody>
                                                  
                                                    <?php
                                                      include('../connect.php');
                                                      $result = $db->prepare("SELECT gen_name, COUNT(*) FROM sales_order GROUP BY gen_name ORDER BY COUNT(*) DESC LIMIT 10");
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
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                        </div>
                       </center>
        <!-- END wrapper -->

    

      
	

</div>
</div>
</div>
</body>
<footer><center> SysGrinder 2021 </center></footer>
<?php include('footer.php'); ?>
</html>
