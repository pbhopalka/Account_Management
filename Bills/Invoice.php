<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add new Bill</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <script src="../trying_design/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

    <link rel="import" href="../trying_design/bower_components/iron-icons/iron-icons.html">
    <link rel="import" href="../trying_design/bower_components/iron-form/iron-form.html">
    <link rel="import" href="../trying_design/bower_components/paper-toolbar/paper-toolbar.html">
    <link rel="import" href="../trying_design/bower_components/font-roboto/roboto.html">
    <link rel="import" href="../trying_design/bower_components/paper-button/paper-button.html">
    <link rel="import" href="../trying_design/bower_components/neon-animation/neon-animation.html">
    <link rel="import" href="../trying_design/bower_components/paper-card/paper-card.html">
    <link rel="import" href="../trying_design/bower_components/paper-checkbox/paper-checkbox.html">
    <link rel="import" href="../trying_design/bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="../trying_design/bower_components/paper-input/paper-input.html">
    <link rel="import" href="../trying_design/bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="../trying_design/bower_components/paper-tabs/paper-tabs.html">
    <link rel="import" href="../trying_design/bower_components/paper-toast/paper-toast.html">
    <link rel="import" href="../trying_design/bower_components/paper-dialog/paper-dialog.html">
    <link rel="import" href="../trying_design/bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
    <link rel="import" href="../trying_design/bower_components/paper-styles/color.html">

    <link rel="stylesheet" href="../trying_design/styles.css">
    </head>
    <body>
      <paper-toolbar>
        <paper-icon-button id="back" src="../img/arrow-left.png" onclick="location.href='../index.php'">-></paper-icon-button>
        <span class="flex">Add New Bill</span>
      </paper-toolbar>
      
      <?php
makeform(htmlspecialchars("InvoiceAdded.php"));

$date = date("Y\-m\-d");
echo "Date : {$date}<br><br>";
echo("Customer Name: ");
//Show List of Customers
	echo '<select id="cust_list" name="cid">';
	$sql = "SELECT Cust_ID, Cust_Name FROM customer_details";
	$result = $mysqli->query($sql);

	while($row = $result->fetch_assoc()){
		echo $row['Cust_ID'];
		echo $row['Cust_Name'];
		//echo "<option value='".$c->id."' ".$selected.">".$c->name."</option>" ;
		echo "<option value='".$row['Cust_ID']."'>".$row['Cust_Name']."</option>";
	}

	echo "</select><br><br>";
//End of list
table_inv();
?>

<tr>
    <td>1</td>
    <td><input name='Item[]' type=text value=0></td>
    <td><input name='Qty[]'  type=text value=0 onchange='update()'></input></td>
    <td><input name='Rate[]' type=text value=0 onchange='update()'></input></td>
    <td><input readonly text name='Amt[]' value=0 maxlength=4 style="border:none; "></input></td>
    <td><input type='button' onclick="Remo(1)"  value=x></input></td>
</tr>
<tr>
    <td>2</td>
    <td><input name='Item[]' type=text value=0></input></td>
    <td><input name='Qty[]'  type=text value=0 onchange='update()'></input></td>
    <td><input name='Rate[]' type=text value=0 onchange='update()'></input></td>
    <td><input readonly text name='Amt[]' value=0 maxlength=4 style="border:none;"></input></td>
    <td><input type='button' onclick="Remo(2)" onchange="update()" value=x></input></td> 
  </tr>



<?php 
end_table();?>
<br>
<input type=button onclick="AddItem()" value='Add New Item'></input>
<input type=button onclick="RemoveItem()" value='Remove All Items'></input>
<p id="Aa">Amount: <input readonly text name='Amout' id="Amout" value=0 maxlength=6 style="border:none;"></input> 
</p><p> 
<text id="Items"><input type=hidden name="ItemsNo"></text>
<input type=submit onclick="Send()"></input>
<?php
endform();?>
</p>

<script>
var x=3;
function update(){
	//alert("a");
	var table = document.getElementById("Bills");
	am = 0;
	
	for(i=1;i<table.rows.length;i++)
	{	
		var e=table.rows[i].cells;
		var q= e[3].children[0].value;
		
		
		
		
		//~ alert(tt);
		if(isNaN(q)){
			alert("Rate of an item must be a number");
		}
		if(isNaN(e[2].children[0].value)){
			alert("Quantity of an item must be a number");
		}

		e[0].innerHTML = i;
		var aam =  e[3].children[0].value * e[2].children[0].value;
		e[4].innerHTML = "<input readonly text name='Amt[]' value='" +aam + "'maxlength=4 style='border:none;'></input>";
		e[5].innerHTML = "<input type='button' onclick='Remo(" + i + ")' value=x></input>";
		am = am + e[3].children[0].value * e[2].children[0].value;
		
	}
	//alert(am);
	document.getElementById("Aa").innerHTML = "Amount: <input readonly text name='Amout' id='Amout' value="+ am +  "></input>";;	
}
function Remo(t){
	//~ alert(t);
	var table = document.getElementById("Bills");
	table.deleteRow(t);
	x=x-1;
	update();
}
function Send(){
	alert("Sure?");
	e = document.getElementById("Items");
	t = document.getElementById("Bills");
	t = t.rows.length;
	e.innerHTML = "<input type=hidden value=" +(t-1)+ " name='ItemsNo'>";
	alert(e.innerHTML);
}
function AddItem() {
    var table = document.getElementById("Bills");
    x = table.rows.length;
    
    var row = table.insertRow(x);
	
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    cell1.innerHTML = x;
    cell2.innerHTML = "<input type=text ></input>";
    cell3.innerHTML = "<input type=text value=0 onchange='update()'></input>";
    cell4.innerHTML = "<input type=text value=0 onchange='update()'></input>";
    cell5.innerHTML = "";
    var butto = "<input type='button' onclick='Remo(" + (x-1) + ")' value=x></input>";
    cell6.innerHTML = butto;
    
    update();
}
function RemoveItem(){
	var table = document.getElementById("Bills");
	var rc = table.rows.length;
	alert("Are you sure? It will delete all the records");
	//alert(rc);
	for(i=1;i<rc;i++)
	{	
		table.deleteRow(1);
		//~ alert(i);
	}
	
    x = table.rows.length;
    
    var row = table.insertRow(x);
	
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    cell1.innerHTML = x;
    cell2.innerHTML = "<input type=text ></input>";
    cell3.innerHTML = "<input type=text value=0 onchange='update()'></input>";
    cell4.innerHTML = "<input type=text value=0 onchange='update()'></input>";
    cell5.innerHTML = "";
    var butto = "<input type='button' onclick='Remo(" + (x-1) + ")' value=x></input>";
    cell6.innerHTML = butto;
    update();
	
}
</script>
<?php
	_Footer();
 ?>
 
