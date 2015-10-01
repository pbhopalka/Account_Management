<?php
  require_once("../includes/global.php");
  if ($_GET['condition'] == "all"){
    $sql = "SELECT * FROM payment_record";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()){
      $payment_id = $row['Payment_ID'];
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
    }
    header('Location: viewPayment.php');
  }
  $payment_id = $_GET['query'];
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
