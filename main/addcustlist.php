<?php
	require_once('auth.php');
?>
<html>

<head>
 




</head>
<body>
<form action="savecustlist.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4></center>
<hr>
<div id="ac">
<input type="hidden" style="width:265px; height:30px;" name="cust_id" Readonly Required ><br>

<span>Customer Name:</span>
<select  name="name" class="chosen-select"  required >
<option >Select Customer</option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT name FROM sales GROUP BY name");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
  }
  ?>
</select><br>

<span>Discount : </span><input type="number" style="width:265px; height:30px;" placeholder="Enter Discount" name="discount"/><br>


<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
</body>
<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/jquery.js"></script>
 
 

<?php include('footer.php');?>
</html>