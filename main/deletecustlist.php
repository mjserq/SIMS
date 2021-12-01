<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM customer_list WHERE cust_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>