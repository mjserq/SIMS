<?php 
require_once('auth.php');
?>
<html>
<head>
<title>
Customer List
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





<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	
	<div class="contentheader">
			<i class="icon-table"></i> Customer List
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Customer List</li>
			</ul>

	
		<div style="margin-top: -19px; margin-bottom: 21px;">
				<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
			<br><br>
			
								<center><h1>List For Discount</h1></center>

		<br><br><input type="text" style="height:35px; width: 40%; margin-top: 50px; margin-left: 22%; color:#222;" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />
<a rel="facebox" href="addcustlist.php"><Button type="submit" class="btn btn-info" style=" margin-left: 40px; margin-top:10px; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Customer</button></a><br><br>


<div id="mainmain">

<table class="hoverTable table table-borderless"  data-responsive="table" style=" width: 100%; margin-left: -40px;" >
	<thead>
		<tr style="font-size: 15px">
			
			<th width="" > Name </th>
			<th width="%"> Discount </th>
			<th width="" > Action </th>
			
		</tr>
	</thead>
	<tbody>

				<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM customer_list ");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">

			<td hidden ><?php echo $row['cust_id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['discount']; ?>.00</td>

			
			
			</td>			<td>
				<a rel="facebox" title="Click to edit the product" href="editcustlist.php?id=<?php echo $row['cust_id']; ?>">
					<button class="btn btn-warning"><i class="icon-edit"></i></button> </a>
				<a href="#" id="<?php echo $row['cust_id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>
				<!--<a rel="facebox" title="Click to view product" href="viewproduct.php?id=<?php echo $row['cust_id']; ?>">
					<button class="btn btn-primary"><i class="icon-list"></i></button> </a>-->

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
   url: "deletecustlist.php",
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