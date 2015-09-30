<?php
require_once("functions.php");
require_once("includes/global.php");

_Header("CusE");

$name =$_POST["name"];
$state=$_POST["state"];
$dist =$_POST["dist"];
$street =$_POST["street"];
$state=$_POST["state"];
$email=$_POST["email"];
$phone=$_POST["phone"];

echo $name  ;
echo $state ;
echo $dist  ;
echo $state ;
echo $email ;
echo $phone ;


$sql = "INSERT INTO customer_details(Cust_ID,Cust_Name,District,Street,State,Email,Phone) VALUES($phone, '$name' , '$dist' , '$street','$state','$email',$phone)";		

echo "<br><br>";

if($mysqli->query($sql)===TRUE)
	header('location:ShowCust.php');
else{
	echo "Error: " . $sql . "<br>" . $mysqli->error;
	header('location:AddCust.php');
}


$mysqli->close();

?>
