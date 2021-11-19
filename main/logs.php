<?php 
require_once('auth.php');
?>
<html>
<head>
<title>
Logs
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

<link rel="stylesheet" type="text/css" href="tcal.css" />

</head>

<body>
<?php include('navfixed.php');?>

	<div class="container-fluid">
      <div class="row-fluid">
	
	<div class="contentheader">
			<i class="icon-table"></i> Sales Logs
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Logs</li>
			</ul>

	
		<div style="margin-top: -19px; margin-bottom: 21px;">
				<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<br>
<br>
<br>


<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search here..." autocomplete="off" />
<div class="content" id="content">
<br><br><br>

<table class="table table-bordered"  data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="9%"> Date </th>
			<th width="14%"> Invoice Number</th>
			<th width="16%"> Cashier </th>
			<th width="15%"> Customer Name </th>
			<th width="12%"> Type </th>
			<th width="12%"> Cash in </th>
			<th width="12%"> Amount </th>
			<th width="2%"> Action </th>
		</tr>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM sales ORDER BY transaction_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['invoice_number']; ?></td>
			<td><?php echo $row['cashier']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['cash']; ?></td>
			<td><?php echo $row['amount']; ?></td>


			<td><a href="logsview.php?invoice=<?php echo $row['invoice_number']; ?>">
					<button class="btn btn-primary"><i> View</i></button> </a></td>
			
			</tr>
			<?php

				}
			?>
		</tbody>
</table>

<div class="clearfix"></div>
</div>
</div>
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
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesalesinventory.php",
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