<?php
  require_once("../includes/global.php");


  $date = $_POST['payment_date'];
  $cust = $_POST['payment_cust'];
  $amount = $_POST['payment_amount'];

  echo $date;
  echo $cust;
  echo $amount;

  $sql = "INSERT INTO payment_record(Date,Cust_ID,Amount) VALUES ('$date', $cust, $amount)";
  if($mysqli->query($sql)===TRUE){
    echo 'Success';
    $sql = "UPDATE customer_details SET Pending_Amount = Pending_Amount - {$amount} WHERE Cust_ID = {$cust}";
    $mysqli->query($sql);
    //die();
  	header('location:viewPayment.php');
  }
  else{
  	echo "Error: " . $sql . "<br>" . $mysqli->error;
  	//die();
    header('location:../index.php');
  }

?>
