<?php

$cat1 =$_REQUEST['cat'];
include('../connect.php');
  
  if ($cat1 !== "") {
  	$query = mysqli_query($connect,"SELECT * from category WHERE name='$cat1' ");
  	$row = mysqli_fetch_array($query);
  	$subcat = $row["sub"];
  }

  $result = array("$subcat");
  $myJSON = json_encode($result);
  echo $myJSON;

?>

