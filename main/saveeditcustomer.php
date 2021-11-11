<?php
	include('../connect.php');
// query
if (isset($_POST['btnUpdate'])) {

		$id = $_POST['memi'];
		$stat = $_POST['stats'];

		$update = "UPDATE customer SET status = '$stat' WHERE customer_id = '$id' ";
		$query = mysqli_query($connect,$update);

		if ($query == TRUE) {
			header("location:customer.php");
			exit();
		}
		else{
			exit();
		}


}

?>