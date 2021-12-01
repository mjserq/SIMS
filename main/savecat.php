<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['subcat'];
// query
$sql = "INSERT INTO category(name,sub) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a ,':b'=>$b));
header("location: cat.php");


?>