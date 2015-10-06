<?php
require_once("../includes/global.php");
  echo $_GET['query'];
  echo 'here';
  $bill_id = $_GET['query'];
  $sql = "SELECT Cust_ID FROM bill_record WHERE Bill_ID = {$bill_id}";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
  $cust_id = $row['Cust_ID'];
  $sql = "SELECT Amount, Date FROM bill_record WHERE Cust_ID = {$cust_id} AND Bill_ID = {$bill_id}";
  echo $sql;
  echo '<br>';
  $result2 = $mysqli->query($sql);
  $row2 = $result2->fetch_assoc();
  $pending_amount = $row2['Amount'];
  $date = $row2['Date'];
  echo $pending_amount;
  echo $date;
  $sql = "UPDATE customer_details SET Pending_Amount = Pending_Amount - {$pending_amount} WHERE Cust_ID = {$cust_id}";
  echo $sql;
  $mysqli->query($sql);
  $sql = "UPDATE ledger SET Bill_Amount = Bill_Amount - {$pending_amount} WHERE Date = '{$date}'";
  echo $sql;
  $mysqli->query($sql);

  //Passing the info from ShowBills to this page is necessary
  $sql = "DELETE FROM bill_record WHERE Bill_ID = {$bill_id}";
  echo $sql;
  //die();
  if ($mysqli->query($sql)===TRUE){
    echo 'Success';
    //die();
  }
  else{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  header('Location: ShowBills.php');
  //echo 'This page loads';
?>
