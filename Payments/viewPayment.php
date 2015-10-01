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
  payment_table();
  while ($row=$result->fetch_assoc()){
    payment_details($row);
    echo '<br>';
  }
  end_table();
?>
   <button id="index" type="submit"><a href="remove.php">Remove payment</a></button><br>
   <button id="index" type="submit"><a href="../index.php">Index</a></button><br>
   <button id="logout" type="submit"><a href="../logout.php">Logout</a></button>
 </body>
 </html>
