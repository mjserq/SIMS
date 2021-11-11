<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$e = $_POST['prod_name'];
$f = $_POST['note'];
$g = $_POST['date'];

// query
$sql = "INSERT INTO customer (customer_name,address,contact,prod_name,note,expected_date) VALUES (:a,:b,:c,:e,:f,:g)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':e'=>$e,':f'=>$f,':g'=>$g));
header("location: customer.php");


?>