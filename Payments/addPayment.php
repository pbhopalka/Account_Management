<?php
  require_once("../includes/global.php");
  //echo $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ACMS: Make Payment</title>
  </head>
  <body>
    <div id="container-sign-in">
      <form id=form-sign-in action="updatePayment.php" method="post">
        <h2>Make a payment</h2>
        <input id="date" name="payment_date" type="date" placeholder="Date">
        <select id="cust_list" name="payment_cust">
<?php
//Display all the customer names in the dropdown list
  $sql = "SELECT Cust_ID, Cust_Name FROM customer_details";
  $result = $mysqli->query($sql);
  while($row = $result->fetch_assoc()){
    echo $row['Cust_ID'];
    echo $row['Cust_Name'];
    //echo "<option value='".$c->id."' ".$selected.">".$c->name."</option>" ;
    echo "<option value='".$row['Cust_ID']."'>".$row['Cust_Name']."</option>";
}
?>
        </select>
        <input id="amount" name="payment_amount" type="text" placeholder="Amount">
        <button id="submit" type="submit">Submit</button>
      </form>
    </div>
  </body>
</html>
