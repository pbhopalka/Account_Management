<?php
if ($_SESSION['login_user'] == 'Superuser'){
  header('Location: AddCust.php') && die();
}

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
_link("Index Page","../index.php");
endform();
_Footer();
?>
