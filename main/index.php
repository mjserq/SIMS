<?php
	require_once('auth.php');
?>
<html>
<head>
	<title>Dashboard</title>


 

<!--sa poip up-->

<script src="js/application.js" type="text/javascript" charset="utf-8"></script>


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
                                <div class="card tilebox-one" style="margin-left: 50px;">
                                    <div class="card-body" style="  width: 250px;
                                                                    padding: 10px;
                                                                    border-radius: 20px;
                                                                    background-color: lightblue;
                                                                    border: 5px  lightgray;
                                                                    margin: 0;">

                                        <a href="yesterdayview.php" rel="facebox"><h4 title="Click here to view" class="text-uppercase mt-0">Yesterday's Sales</h4></a>
                                        <h2 class="my-2"><?php echo $row['COUNT(DISTINCT invoice)']; ?></h2>
                                        <?php
                                             } 
                                         ?>
                                        <!-- <a style="margin-left: -2px;" rel="facebox" title="Click to view" href="yesterdayview.php">
          <button class="btn btn-info"><i class="icon-list"></i></button> </a>-->

                                         
                                         
                                    </div> <!-- end card-body-->
                                </div>

                                <!--end card-->

                                <?php
                                    include('../connect.php');
                                    $result2 = $db->prepare("SELECT COUNT(DISTINCT invoice) FROM sales_order WHERE date=curdate()");
                                    $result2->execute();
                                    for($i=0; $row = $result2->fetch(); $i++){
                                    ?>

                                <div class="card tilebox-one" style="margin-top: -120px;
                                                                    margin-left: 350px">
                                    <div class="card-body" style="  width: 250px;
                                                                    padding: 10px;
                                                                    border-radius: 20px;
                                                                    background-color: lightblue;
                                                                    border: 5px  lightgray;
                                                                    margin: 0;">
                                       <a href="todayview.php" rel="facebox"> <h4  class="text-uppercase mt-0">Today's Sales</h4></a>
                                        <h2 class="my-2" ><?php echo $row['COUNT(DISTINCT invoice)']; ?></h2>
                                        <?php
                                             }
                                         ?>
                                         <!--<a style="margin-left: -2px;" rel="facebox" title="Click to view" href="todayview.php">
          <button class="btn btn-info"><i class="icon-list"></i></button> </a>-->

                                        
                                    </div> <!-- end card-body-->
                                </div>
                                <!--end card--> 





                                <?php
                                    include('../connect.php');
                                    $result3 = $db->prepare("SELECT customer_id, COUNT(*) FROM customer WHERE status = 'Pending'");
                                    $result3->execute();
                                    for($i=0; $row = $result3->fetch(); $i++){
                                    ?>

                                <div class="card tilebox-one" style="margin-top: -120px; margin-left: 650px;">
                                    <div class="card-body" style="  width: 250px;
                                                                    padding: 10px;
                                                                    border-radius: 20px;
                                                                    background-color: lightblue;
                                                                    border: 5px  lightgray;
                                                                    margin: 0;">
                                        <a href="pendingview.php" rel="facebox"><h4  title="Click to View" class="text-uppercase mt-0">Pending Reservations</h4></a>
                                        <h2 class="my-2" ><?php echo $row['COUNT(*)']; ?></h2>
                                        <?php
                                             }
                                         ?>
                                        <!-- <a style="margin-left: -2px;" rel="facebox" title="Click to view" href="pendingview.php">
          <button class="btn btn-info"><i class="icon-list"></i></button> </a>-->
                                        
                                    </div> <!-- end card-body-->
                                </div>
                                <!--end card-->


                                <?php
                          include('../connect.php');
                          $result1 = $db->prepare("SELECT COUNT(*) FROM products WHERE expiry_date<=curdate() + interval 3 day");
                          $result1->execute();
                          for($i=0; $row = $result1->fetch(); $i++){
                          ?>

                        <div class="row">
                                <div class="card tilebox-one" style="margin-left: 233px; margin-top: 30px;">
                                    <div class="card-body" style="  width: 250px;
                                                                    padding: 10px;
                                                                    border-radius: 20px;
                                                                    background-color: lightblue;
                                                                    border: 5px  lightgray;
                                                                    margin: 0;">
                                        <a href="expiringview.php" rel="facebox"><h4 class="text-uppercase mt-0">Expiring Products</h4></a>
                                        <h2 class="my-2"><?php echo $row['COUNT(*)']; ?></h2>
                                        <?php
                                             } 
                                         ?>
                                        <!-- <a style="margin-left: -2px;" rel="facebox" title="Click to view" href="expiringview.php">
          <button class="btn btn-info"><i class="icon-list"></i></button> </a>-->
                                    </div> <!-- end card-body-->
                                </div>
                                <!--end card-->  

                                <?php
                          include('../connect.php');
                          $result1 = $db->prepare("SELECT COUNT(*) FROM products where qty <=5 ");
                          $result1->execute();
                          for($i=0; $row = $result1->fetch(); $i++){
                          ?>

                        <div class="row">
                                <div class="card tilebox-one" style="margin-left: 563px; margin-top: -120px;">
                                    <div class="card-body" style="  width: 250px;
                                                                    padding: 10px;
                                                                    border-radius: 20px;
                                                                    background-color: lightblue;
                                                                    border: 5px  lightgray;
                                                                    margin: 0;">
                                        <a href="criticalview.php" rel="facebox"><h4 class="text-uppercase mt-0">Critical Products</h4></a>
                                        <h2 class="my-2"><?php echo $row['COUNT(*)']; ?></h2>
                                        <?php
                                             } 
                                         ?>
                                        <!--<a style="margin-left: -2px;" rel="facebox" title="Click to view" href="criticalview.php">
          <button class="btn btn-info"><i class="icon-list"></i></button> </a>-->
                                    </div> <!-- end card-body-->
                                </div>
                                <!--end card-->            
                        <br><br>

                          <center>
                            <div class="col-xl-9 col-lg-8" style="margin-left: 90px;">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                       
                                        
                                        <a href="customerlist.php" style="color: black;"><h2 class="header-title mb-3">Top Customers</h2></a>

                                        <div dir="ltr">
                                            <div ><table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
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

                            <div class="col-xl-9 col-lg-8" style="margin-left: 90px;">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                       
                                        
                                        <h2 class="header-title mb-3">Top Sold Products</h2>

                                        <div dir="ltr">
                                            <div ><table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
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

                            <div class="col-xl-9 col-lg-8" style="margin-left: 90px;">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                       
                                        
                                        <h2 class="header-title mb-3">Top Sales Categories</h2>

                                        <div dir="ltr">
                                            <div ><table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
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

<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(document).ready(function() {
    $('#yesterday').facebox();
})
  })
</script>
<br><br>
<footer style="margin-left: -80px"><center> SysGrinder 2021 </center></footer>
<?php include('footer.php'); ?>
</html>
