<?php
  require_once("../includes/global.php");
  if ($_GET['condition'] == "all"){
    $sql = "SELECT * FROM payment_record";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()){
      $payment_id = $row['Payment_ID'];
      $cust_id = $row['Cust_ID'];

      //Updating Pending Amount in Customer Details
      $sql = "SELECT Amount, Date FROM payment_record WHERE Cust_ID = {$cust_id}";
      $result2 = $mysqli->query($sql);
      $row2 = $result2->fetch_assoc();
      $pending_amount = $row2['Amount'];
      $date = $row2['Date'];
      $sql = "UPDATE ledger SET Payment_Received = Payment_Received - {$pending_amount} WHERE Date = '{$date}'";
      echo $sql;
      $mysqli->query($sql);
      $sql = "UPDATE customer_details SET Pending_Amount = Pending_Amount + {$pending_amount} WHERE Cust_ID = {$cust_id}";
      echo $sql;
      $mysqli->query($sql);
      //Deleting the Payment Record
      $sql = "DELETE FROM payment_record WHERE Payment_ID = {$payment_id}";
      $mysqli->query($sql);
      /*echo $sql;
      //die();
      if ($mysqli->query($sql)===TRUE){
        echo 'Success';
        //die();
      }
      else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }*/
    }
    header('Location: viewPayment.php');
  }

  $payment_id = $_GET['query'];
  $sql = "SELECT Cust_ID FROM payment_record";
  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();
  $cust_id = $row['Cust_ID'];
  $sql = "SELECT Amount, Date FROM payment_record WHERE Cust_ID = {$cust_id}";
  $result2 = $mysqli->query($sql);
  $row2 = $result2->fetch_assoc();
  $pending_amount = $row2['Amount'];
  $date = $row2['Date'];
  $sql = "UPDATE ledger SET Payment_Received = Payment_Received - {$pending_amount} WHERE Date = '{$date}'";
  echo $sql;
  $mysqli->query($sql);
  $sql = "UPDATE customer_details SET Pending_Amount = Pending_Amount + {$pending_amount} WHERE Cust_ID = {$cust_id}";
  echo $sql;
  $mysqli->query($sql);

  //Passing the info from viewPayment to this page is necessary
  $sql = "DELETE FROM payment_record WHERE Payment_ID = {$payment_id}";
  echo $sql;
  //die();
  if ($mysqli->query($sql)===TRUE){
    echo 'Success';
    //die();
  }
  else{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  header('Location: viewPayment.php');
  //echo 'This page loads';
?>
