<?php
session_start();
include('../connect.php');
$a = $_POST['cust_id'];
$b = $_POST['name'];
$c = $_POST['discount'];

// query
$sql = "INSERT INTO customer_list (cust_id,name,discount) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location: customerlist.php");


?>