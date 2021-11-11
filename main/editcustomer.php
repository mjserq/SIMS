<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditcustomer.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Update Status</h4>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />

<label style="width:265px; height:30px; font-size: 20px" for="stat">Status:</label>

<select name="stats" id="stat">
  <option value="Pending">Pending</option>
  <option value="Complete">Complete</option>
</select>
<br>

<button class="btn btn-success btn-block btn-large" name="btnUpdate" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button></center>
</div>
</div>
</form>
<?php
}
?>