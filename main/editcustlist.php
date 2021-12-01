<?php 
require_once('auth.php');
?>
<?php
  include('../connect.php');
  $id=$_GET['id'];
  $result = $db->prepare("SELECT * FROM customer_list WHERE cust_id= :userid");
  $result->bindParam(':userid', $id);
  $result->execute();
  for($i=0; $row = $result->fetch(); $i++){
?>
<html>

<head>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>




</head>
<body>
<form action="saveeditcustlist.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Edit Customer</h4></center>
<hr>
<div id="ac">
<input type="hidden" style="width:265px; height:30px;" name="cust" value="<?php echo $id; ?>"  Readonly Required ><br>

<span>Customer Name:</span>
<input type="text"  name="name" value="<?php echo $row['name']; ?>"  style="width:265px; height:30px; margin-left:-5px;"Readonly >
<br>

<span>Discount : </span><input type="number" value="<?php echo $row['discount']; ?>" style="width:265px; height:30px;" placeholder="Enter Discount" name="discount"/><br>


<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
</body>
<script src="js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/jquery.js"></script>
 <?php
}
 ?>

<?php include('footer.php');?>
</html>