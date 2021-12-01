<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['cust'];
$a = $_POST['name'];
$b = $_POST['discount'];

// query
$sql = "UPDATE customer_list 
        SET  name=?, discount=?
		WHERE cust_id=?";
$q = $db->prepare($sql);
$q->execute(array($a, $b,$id));
header("location: customerlist.php");

?>