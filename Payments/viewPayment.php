<?php
  require_once("../includes/global.php");
  require_once("functions.php");
  //echo $_SESSION['login_user'];
 ?>
 <html>
 <head>
   <title>ACMS: View Payments</title>
 </head>
 <body>
   <h1>Payments Record</h1>
<?php
  $sql = "SELECT * FROM payment_record";
  $result = $mysqli->query($sql);
  if ($result->num_rows <=0){
    $sql = "ALTER TABLE payment_record auto_increment = 1";
    $result = $mysqli->query($sql);
    echo 'No payment entries<br>';
  }
  else{
    payment_table();
    while ($row=$result->fetch_assoc()){
      payment_details($row);
      echo '<br>';
    }
    end_table();
  }
?>
   <button id="index" type="submit"><a href="removePayment.php?condition=all">Remove all</a></button><br>
   <button id="index" type="submit"><a href="addPayment.php">Add Another Payment</a></button><br>
   <button id="index" type="submit"><a href="../index.php">Index</a></button><br>
   <button id="logout" type="submit"><a href="../logout.php">Logout</a></button>
 </body>
 </html>
