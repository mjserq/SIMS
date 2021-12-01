<?php include 'auth.php';?>
<html>
<head>
	<title>Point Of Sale</title>
</head>

<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/jquery.js"></script>
 
 <script type="text/javascript">
   function GetDetail(str){
    if (str.length == 0) {
      document.getElementById("dis").value = "asdasdasd";
      return;
    }
    else{
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          var myObj = JSON.parse(this.responseText);
          document.getElementById("dis").value= myObj[0];
        }
      };
     xmlhttp.open("GET","search2.php?cust=" +str,true);
     xmlhttp.send();
    }
   }
 </script>
<body >

<?php include 'header.php'; ?>
<?php include('navfixed.php');?>


    <div class="container-fluid">


      <div class="row-fluid">
	   	
	<div class="container-fluid">
		<div class="contentheader">
			<i class="icon-money"></i> Point Of Sale
			</div>
			<ul class="breadcrumb">
			<a href="index.php"><li>Dashboard</li></a> /
			<li class="active">Point of Sale</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
	<?php
	$position=$_SESSION['SESS_LAST_NAME'];
	if($position=='cashier') {
	?>
	<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>

	<a href="../index.php">Logout</a>
	<?php
	}
	if($position=='admin') {
	?>
					<?php } ?>										
	<form action="incoming.php" method="post" >
												
	<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
	<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
	<br>

	<select name="product" style="width:700px; "class="chzn-select" required>
	<option></option>
		<?php
		include('../connect.php');
		$result = $db->prepare("SELECT * FROM products");
			$result->bindParam(':userid', $res);
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
			$date = DateTime::createFromFormat('Y-m-d', $row["expiry_date"]);
		?>
			<option value="<?php echo $row['product_id'];?>"><?php echo $row['gen_name']; ?> - <?php echo $row['product_name']; ?> - <?php echo $row['subcat']; ?> - Qty: <?php echo $row['qty']; ?> - Price: <?php echo $row['price']; ?> | Expires at: <?php echo htmlspecialchars($date->format('F d, Y'));?></option>
	<?php
				}
			?>
</select>
Qty: <input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;"required>
<input  type="hidden" placeholder="Enter Customer" id="cust" onkeyup="GetDetail(this.value)" style="width: 200px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;">
	<!--<option >-Select Customer-</option>-->
		<?php
		include('../connect.php');
		$result = $db->prepare("SELECT * FROM customer_list");
			$result->bindParam(':userid', $res);
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
		?>
			<!--<option value="<?php echo $row['cust_id'];?>"><?php echo $row['name'];?></option>-->
	<?php
				}
			?>
</select>

Discount: <input type="number" id="dis" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" placeholder="Discount" value="<?php echo $row['discount']; ?>" name="discount"/> 
<input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>

</form>

<table border="0" class="table"  data-responsive="table">


	<thead>
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

		<tr>
			<th> Product Code </th>
			<th> Category </th>
			<th> Product Name </th>
			<th> Price </th>
			<th> Qty </th>			
			<th> Amount </th>
			<th hidden=""> Profit </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody >


		
			<?php
				$id=$_GET['invoice'];
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			<tr >
			<td hidden><?php echo $row['product']; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['gen_name']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td>
			<?php
			$ppp=$row['price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			<td><?php echo $row['qty']; ?></td>

			<td>
			<?php
			$dfdf=$row['amount'];
			echo formatMoney($dfdf, true);
			?>
			</td>

	

			<td hidden="">
			<?php
			$profit=$row['profit'];
			echo formatMoney($profit, true);
			?>
			</td>
			<td width="90"><a href="delete.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td> Total Amount: </td>
			<td hidden=""> Total Profit: </td>
			<th>  </th>
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;"></strong></th>
				<td colspan="1"><strong style="font-size: 25px; color: #222222;">
				<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></td>
				<td hidden="" colspan="1"><strong style="font-size: 25px; color: #222222;">
			<?php 
				$resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
				$resulta->bindParam(':b', $sdsd);
				$resulta->execute();
				for($i=0; $qwe = $resulta->fetch(); $i++){
				$asd=$qwe['sum(profit)'];
				echo formatMoney($asd, true);
				}
				?>
		
				</td>
				<tr>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
				</tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
				<th colspan="1">
                                        
                                <a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>"><button class="btn btn-success btn-large btn-block"><i  class="icon icon-save icon-large" ></i> Invoice</button></a>
<div class="clearfix"></div>
					
                                </th>
			</tr>
		
	</tbody>


</table><br>

</div >
</div>
</body>


<?php include('footer.php');?>
</html>