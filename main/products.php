<?php 
require_once('auth.php');
?>
<html>
<head>
<title>
Products Inventory
</title>


 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>


<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
        }
</script>


<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	
	<div class="contentheader">
			<i class="icon-table"></i> Products
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Products</li>
			</ul>

	
		<div style="margin-top: -19px; margin-bottom: 21px;">
				<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products ORDER BY qty_sold DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products where qty < 10 ORDER BY product_id DESC");
				$result->execute();
				$rowcount123 = $result->rowcount();
 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM products where qty <=5 ORDER BY product_id DESC");
				$result->execute();
				$rowcount1234 = $result->rowcount();

				include('../connect.php');
				$result = $db->prepare("SELECT * FROM products where expiry_date<=curdate()");
				$result->execute();
				$expiring = $result->rowcount();
				

				include('../connect.php');
				$result = $db->prepare("DELETE FROM products where qty <= 0");
				$result->execute();
				$delete = $result->rowcount();



			?>
			<center>
			<div >
			<font color="green" style="font:bold 22px 'Aleo'; margin-left: -120px;">[<?php echo $rowcount;?>]</font>Total Number of Products 
			</div>
			
			<div>
			<font style="color:blue; font:bold 22px 'Aleo'; margin-left: -47px;">[<?php echo $rowcount123;?>]</font> Products are below Quantity of 10
			</div>

			<div >
			<font color="red" style="font:bold 22px 'Aleo'; margin-left: 7px;">[<?php echo $rowcount1234;?>]</font> Products has Critical Quantity  
			</div>

			<div>
			<font style="color:black; font:bold 22px 'Aleo'; margin-left: -92px;">[<?php echo $expiring;?>]</font> Products Expired   
			</div>
			</center>
        </div>
    
<input type="text" style="height:35px; width: 40%; margin-top: 50px; margin-left: 10%; color:#222;" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
<a rel="facebox" href="addproduct.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Product</button></a><br><br>
<a href="cat.php"><Button class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Category</button></a><br><br>

<table class="hoverTable table table-borderless"  data-responsive="table" style=" width: 80%; margin-left: 10%" >
	<thead>
		<tr style="font-size: 15px">
			<th width="1%"></th>
			<th width="1%"></th>
			<th width="6"> Product Code </th>
			<th width="6"> Product Name </th>
			<th width="3"> Category </th>
			<th width="4"> Sub-Category </th>
			<th width="6"> Expiry Date </th>
			<th width="2"> Original Price </th>
			<th width="3"> Selling Price </th>
			<th width="3" > Qty Left </th>
			<th width="3" > Total </th>
			<th width="11%"> Action </th>
		</tr>
	</thead>
	<tbody>

		
			<?php
			function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				include('../connect.php');
				$result = $db->prepare("SELECT *, price * qty as total  FROM products ORDER BY product_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){


				   $datenow = date('Y-m-d'); 
				   $expiry = $datenow;
                   $expired=$row['expiry_date'];	
					$total=$row['total'];
					$qtyleft=$row['qty'];
					if ($qtyleft <= 5 )  {
				    echo '<tr class="alert alert-warning record" style="color: #fff; background:red;">';

					echo '<td style="color: #fff; background:red;">Critical</td>';
					echo '<td ></td>';


                   }

   				
				   
				else {
				echo '<tr class="record">';
				echo '<td ></td>';
				echo '<td ></td>';
			
			
				
				}
			?>


			<td colspan="" ><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['product_name']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			<td><?php echo $row['subcat']; ?></td>
			<?php
			 $datenow = date('Y-m-d'); 
			$date = DateTime::createFromFormat('Y-m-d', $row["expiry_date"]);
			
			?>
			<td><?php echo htmlspecialchars($date->format('F d, Y'));?></td>
			<td><?php
			$oprice=$row['o_price'];
			echo formatMoney($oprice, true);
			?></td>
			<td><?php
			$pprice=$row['price'];
			echo formatMoney($pprice, true);
			?></td>

			<td ><?php echo $row['qty']; ?></td>

			<td>
			<?php
		
			$total=$row['total'];
			echo formatMoney($total, true);
			?>
			</td>			<td>
				<a rel="facebox" title="Click to edit the product" href="editproduct.php?id=<?php echo $row['product_id']; ?>">
					<button class="btn btn-warning"><i class="icon-edit"></i></button> </a>
				<a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>
				<a rel="facebox" title="Click to view product" href="viewproduct.php?id=<?php echo $row['product_id']; ?>">
					<button class="btn btn-primary"><i class="icon-list"></i></button> </a>

							</td>
			</tr>
			<?php
				
				}
			?>
		
		
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>

</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this Product?"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteproduct.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
<?php include('footer.php');?>

</html>