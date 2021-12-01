<?php 
require_once('auth.php');
?>
<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-list icon-small"></i><?php echo $row['product_name']; ?></h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Product Code : </span><input type="text" readonly style="width:265px; height:30px;"  name="code" value="<?php echo $row['product_code']; ?>" Required /><br>

<span>Product Name: </span><textarea readonly style="width:265px; height:50px;" name="name" ><?php echo $row['product_name']; ?></textarea><br>

<span>Category : </span><input type="text" readonly style="width:265px; height:30px;"  name="gen" value="<?php echo $row['gen_name']; ?>" /><br>

<span>Sub Category : </span><input type="text" readonly style="width:265px; height:30px;"  name="subcat" value="<?php echo $row['subcat']; ?>" /><br>

<span>Date Arrival: </span><input type="date" readonly style="width:265px; height:30px;" name="date_arrival" value="<?php echo $row['date_arrival']; ?>" /><br>

<span>Expiry Date : </span><input type="date" readonly style="width:265px; height:30px;" name="exdate" value="<?php echo $row['expiry_date']; ?>" /><br>

<span>Selling Price : </span><input type="text" readonly style="width:265px; height:30px;" id="txt1" name="price" value="<?php echo $row['price']; ?>" onkeyup="sum();" Required/><br>

<span>Original Price : </span><input type="text" readonly style="width:265px; height:30px;" id="txt2" name="o_price" value="<?php echo $row['o_price']; ?>" onkeyup="sum();" Required/><br>

<span>Profit : </span><input type="text" style="width:265px; height:30px;" id="txt3" name="profit" value="<?php echo $row['profit']; ?>" readonly><br>

<span>Supplier : </span><input type="text" style="width:265px; height:30px;" id="txt3" name="supplier" value="<?php echo $row['supplier']; ?>" readonly><br>

<span>QTY Left: </span><input readonly type="number" style="width:265px; height:30px;" min="0" name="qty" value="<?php echo $row['qty']; ?>" /><br>

<span>Quantity: </span><input readonly type="number" style="width:265px; height:30px;" min="0" name="sold" value="<?php echo $row['qty_sold']; ?>" /><br>

<div style="float:right; margin-right:10px;">


</div>
</div>
</form>
<?php
}
?>