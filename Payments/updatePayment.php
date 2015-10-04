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

    //adding date if not in Ledger
    $sql = "SELECT Date FROM ledger WHERE Date='$date'";
    echo $sql;
    $res = $mysqli->query($sql);
    if($res->num_rows > 0 ){
      echo "yess";
      $sql = "UPDATE ledger SET Payment_Received = Payment_Received + {$amount} WHERE Date='$date'";
      echo "<br>".$sql;
      $mysqli->query($sql);
      echo "updated";
    }
    else{
      echo "noo";
      $sql = "INSERT INTO ledger VALUES('$date',0,$amount)";
      echo $sql;
      if($mysqli->query($sql)===TRUE)
        echo "Inserted";
      else{
        echo "Nope";
        echo $mysqli->error;
      }
    }
    //die();
  	header('location:viewPayment.php');
  }
  else{
  	echo "Error: " . $sql . "<br>" . $mysqli->error;
  	//die();
    header('location:../index.php');
  }

?>
