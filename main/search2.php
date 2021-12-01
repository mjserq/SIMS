<?php

 $customer =$_REQUEST['cust'];
include('../connect.php');
  
  if ($customer !== "") {
  	$query = mysqli_query($connect,"SELECT * from customer_list WHERE name='$customer' ");
  	$row = mysqli_fetch_array($query);
  	$dis = $row["discount"];
  }

  $result = array("$dis");
  $myJSON = json_encode($result);
  echo $myJSON;
?>