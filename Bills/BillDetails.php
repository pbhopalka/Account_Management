<?php
  require_once('functions.php');
  require_once("../includes/global.php");
  //echo $_GET["query"];?>
  <p><a href="../index.php">Index Page</a></p>
  <?php
  $sql = "SELECT * FROM bill_record WHERE Bill_ID = {$_GET["query"]}";
  $result = $mysqli->query($sql);
  // /echo $res;
  $res = $result->fetch_assoc();
  //echo $res["Cust_ID"];
  $sql2 = "SELECT Cust_Name FROM customer_details WHERE Cust_ID={$res['Cust_ID']}";
  //echo $sql2;
  $cust = $mysqli->query($sql2);
  $cust = $cust->fetch_assoc();
  echo "<h4>Date: {$res['Date']}</h4>";
  echo "<h4>Bill Number: {$res['Bill_ID']}</h4>";
  echo "<h4>Customer: {$cust['Cust_Name']}</h4>";
  echo "<h4>Total Amount: {$res['Amount']}</h4>";
  $sql = "SELECT * FROM bills WHERE Bill_ID = {$_GET["query"]}";
  $result = $mysqli->query($sql);
  if ($result->num_rows < 0)
    echo 'No items in this bill';
  else{
    bill_header();
    $count = 1;
    while($res = $result->fetch_assoc()){
        bill_item($count, $res);
        $count = $count + 1;
    }
    end_bill();

  }


 ?>
