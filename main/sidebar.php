
<style>

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>

<div style="margin-top: 25px;" class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
                                  <?php
                  $position=$_SESSION['SESS_LAST_NAME'];
                  if($position=='Cashier') {
                  ?>
                  <!--<li><form class="example" action="preview.php?invoice=">
                  <input style="width: 120px; height: 40px;" type="text" placeholder="Invoice No." name="invoice" required>
                  <button style="width: 40px" type="submit" name="searchBtn"><i class="fa icon-search icon-small"></i></button>

                   <?php
                        if (isset($_POST['searchBtn'])) {
                          include('../connect.php');
                          $result = $db->prepare("SELECT * FROM sales_order WHERE invoice='invoice'");
                          $result->execute();
                        }else{
                         
                        }

                          ?>
                  </form></li>-->
                  <li class="active"><a href="index.php"><i class="icon-dashboard icon-large"></i> Dashboard <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li> 
                  <li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-large"></i> Point of Sale <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <li><a href="customer.php"><i class="icon-group icon-large"></i> Customer Reservation <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  

                  <?php
                  }
                  if($position=='Admin') {
                  ?>


                <!-- <li><form class="example" action="preview.php?invoice=">
                  <input style="width: 120px; height: 40px;" type="text" placeholder="Invoice No." name="invoice" required>
                  <button style="width: 40px" type="submit" name="searchBtn"><i class="fa icon-search icon-small"></i></button>

                   <?php
                        if (isset($_POST['searchBtn'])) {
                          include('../connect.php');
                          $result = $db->prepare("SELECT * FROM sales_order WHERE invoice='invoice'");
                          $result->execute();
                        }else{
                         
                        }

                          ?>
                  </form></li>-->

                  <li class="active"><a href="index.php"><i class="icon-dashboard icon-large"></i> Dashboard <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li> 
                  <li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-large"></i> Point of Sale <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <li><a href="customer.php"><i class="icon-group icon-large"></i> Customer Reservation <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <li><a href="products.php"><i class="icon-table icon-large"></i> Inventory <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <li><a href="supplier.php"><i class="icon-group icon-large"></i> Suppliers <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-large"></i> Sales Report <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <li><a href="sales_inventory.php"><i class="icon-inbox icon-large"></i> Sales Inventory <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <li><a href="admin-settings.php"><i class="icon-user icon-large"></i> User Manager <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <li><a href="logs.php"><i class="icon-book icon-large"></i> Logs <div class="pull-right"><i class="icon-circle-arrow-right icon-large"></i></div></a></li>
                  <?php 
                      }                   
                      ?>



              
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
   