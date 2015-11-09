<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ACMS: Make Payment</title>
  <?php
		_Header();
   ?>
    <body>
      <paper-toolbar>
        <paper-icon-button id="back" src="../img/arrow-left.png" onclick="location.href='../index.php'">-></paper-icon-button>
        <span class="flex">Add New Customer</span>
      </paper-toolbar>
      <?php
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
