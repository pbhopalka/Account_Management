<?php
  require_once("includes/global.php");
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
  while ($row=$result->fetch_assoc()){
    printf ("%d %s %d %d\n",$row["Payment_ID"],$row["Date"],$row["Cust_ID"],$row["Amount"]);
    echo '<br>';
  }
?>
   <button id="index" type="submit"><a href="index.php">Index</a></button><br>
   <button id="logout" type="submit"><a href="logout.php">Logout</a></button>
 </body>
 </html>
