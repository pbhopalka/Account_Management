<?php
$_SESSION["user"]=TRUE;
//echo "sdssdsd";
if(!isset($_SESSION["user"]))
	header('location:index.php');

require_once('functions.php');
_Header("CusA");
makeform(htmlspecialchars("CustAdded.php"));
item("Name",'text','name');
item("State",'text','state');
item("District",'text','dist');
item("Street",'text','street');
item("Email",'text','email');
item("Phone",'text','phone');
item("",'submit','roll');
_link("Show Costumers","ShowCust.php");
endform();
_Footer();
?>
