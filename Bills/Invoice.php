<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add new Bill</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ACMS - Bills</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="../dashboard/images/favicon.png" />

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
    <link rel="import" href="../trying_design/bower_components/paper-listbox/paper-listbox.html">
    <link rel="import" href="../trying_design/bower_components/paper-tabs/paper-tabs.html">
    <link rel="import" href="../trying_design/bower_components/paper-toast/paper-toast.html">
    <link rel="import" href="../trying_design/bower_components/paper-dialog/paper-dialog.html">
    <link rel="import" href="../trying_design/bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
    <link rel="import" href="../trying_design/bower_components/paper-styles/color.html">
    <link rel="stylesheet" href="../trying_design/styles.css">
    <link rel='stylesheet' href='../includes/table.less'>

    <link rel='stylesheet' href='../dashboard/material.min.css'>
    <link rel='stylesheet' href='../dashboard/styles.css'>

    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    #Bill {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }

    paper-dropdown-menu {
      text-align: left;
      margin: auto;
      width: 180px;
    }
    paper-dropdown-menu.letters {
     width: 90px;
   }
    </style>

    </head>
    <body>
      <paper-toolbar>
        <paper-icon-button id="back" src="../img/arrow-left.png" onclick="location.href='../index.php'">-></paper-icon-button>
        <span class="flex">Add New Bill</span>
      </paper-toolbar>
      <?php $cid = 0; ?>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <form id="data" method='post' action="InvoiceAdded.php">

          <div class="demo-card mdl-cell mdl-cell--12-col mdl-grid">
            <div style="width: 40%; float: left; padding-left: 10px;">
              <h5 class="title-text">Customer Name
                <?php
                echo '<select label="Customers" id="cust_list" name="cid">';
              	$sql = "SELECT Cust_ID, Cust_Name FROM customer_details";
              	$result = $mysqli->query($sql);

              	while($row = $result->fetch_assoc()){
              		echo $row['Cust_ID'];
                  $cid = $row['Cust_ID'];
              		//echo $row['Cust_Name'];
              		//echo "<option value='".$c->id."' ".$selected.">".$c->name."</option>" ;
              		echo "<option value='".$row['Cust_ID']."'>".$row['Cust_Name']."</option><br>";
              	}

              	echo "</select>";
                ?>
              </h5>
            </div>
            <div style="width: 50%; margin-right: 0px; float:right;">
              <?php
                date_default_timezone_set('Asia/Kolkata');
                $day = date("l");
                $date = date("l jS \of F Y");
              ?>
              <h5 style="text-align: right;"><?php echo $date;?></h5>
            </div>
        </div>
        <paper-fab icon="done" type=submit onclick="Send()" ></paper-fab>
        <?php
        $date = date("Y\-m\-d");
        ?>

<paper-material id="table-material" class="table-condensed">
<?php table_inv();?>

<tr>
    <td>1</td>
    <td><paper-input name='Item[]' type=text></paper-input></td>
    <td><paper-input name='Qty[]'  type=text value=0 onchange='update()'></paper-input></td>
    <td><paper-input name='Rate[]' type=text value=0 onchange='update()'></paper-input></td>
    <td><paper-input disabled text name='Amt[]' value=0 maxlength=4 style="border:none; "></paper-input></td>
    <td><paper-button type='button' onclick="Remo(1)" onchange="update()"><img src = "../img/delete_24.png"></img></paper-button></td>
</tr>
<tr>
    <td>2</td>
    <td><paper-input name='Item[]' type=text></paper-input></td>
    <td><paper-input name='Qty[]'  type=text value=0 onchange='update()'></paper-input></td>
    <td><paper-input name='Rate[]' type=text value=0 onchange='update()'></paper-input></td>
    <td><paper-input disabled text name='Amt[]' value=0 maxlength=4 style="border:none;"></paper-input></td>
    <td><paper-button type='button' onclick="Remo(2)" onchange="update()"><img src = "../img/delete_24.png"></img></paper-button></td>
  </tr>



<?php end_table();?>
</paper-material>
    <br>
    <input type=button onclick="AddItem()" value='Add New Item'></input>
    <input type=button onclick="RemoveItem()" value='Remove All Items'></input>
    <p id="Aa">Total Amount: <paper-input disabled right name='Amout' id="Amout" value=0 maxlength=6 style="border:none;"></paper-input></p>
    <text id="Items"><input type=hidden name="ItemsNo"></text>
    <text id="NewAmt"><input type=hidden name="NewAmtName"></text>
    <!--<input type=submit onclick="Send()"></input></paper-fab>-->


    <paper-toast id="toast" text="Amount cannot be 0"></paper-toast>
    <paper-toast id="rate" text="Rate should be a numerical value"></paper-toast>
    <paper-toast id="quantity" text="Quantity should be an integer"></paper-toast>


<?php
endform();?>
</div>
</main>

<script>
  var x=3,am=0;
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
        document.querySelector('#rate').show();
  			//alert("Rate of an item must be a number");
  		}
  		if(isNaN(e[2].children[0].value)){
        document.querySelector('#quantity').show();
  			//alert("Quantity of an item must be a number");
  		}

  		e[0].innerHTML = i;
  		var aam =  e[3].children[0].value * e[2].children[0].value;
  		e[4].innerHTML = "<paper-input text readonly name='Amt[]' value='" + aam + "'maxlength=4></paper-input>";
  		e[5].innerHTML = "<paper-button type='button' onclick='Remo(" + i + ")'><img src = '../img/delete_24.png'></img></paper-button>";
  		am = am + e[3].children[0].value * e[2].children[0].value;

  	}
  	//alert(am);
  	document.getElementById("Aa").innerHTML = "Amount: <paper-input disabled text name='Amout' id='Amout' value="+ am +  "></paper-input>";;
  }

  function Remo(t){
  	//~ alert(t);
  	var table = document.getElementById("Bills");
  	table.deleteRow(t);
  	x=x-1;
  	update();
  }

  function Send() {
  	update();
  	var table = document.getElementById("Bills");
  	//alert(table.rows.length);
  	if(am==0){
        document.querySelector('#toast').show();
    }
  		//alert("Bill can't have amount 0");
  	else{
  		alert("Sure?");
  		e = document.getElementById("Items");
  		ed = document.getElementById("NewAmt");
      //s = document.getElementById("cid");
  		t = document.getElementById("Bills");
      //alert(s.innerHTML);
  		t = t.rows.length;
      //~ alert("This is done");
  		e.innerHTML = "<input type=hidden value=" +(t-1)+ " name='ItemsNo'>";
  		ed.innerHTML = "<input type=hidden value=" +am+ " name='NewAmtName'>";
  		//~ alert(e.innerHTML);
      document.getElementById('data').submit();
  	}
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
      cell2.innerHTML = "<paper-input name='Item[]' type=text ></paper-input>";
      cell3.innerHTML = "<paper-input name='Qty[]' type=text value=0 onchange='update()'></paper-input>";
      cell4.innerHTML = "<paper-input name='Rate[]' type=text value=0 onchange='update()'></paper-input>";
      cell5.innerHTML = "";
      var butto = "<paper-button type='button' onclick='Remo(" + (x-1) + ")'><img src = '../img/delete_24.png'></img></paper-button>";
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
      cell2.innerHTML = "<paper-input type=text name='Item[]' ></paper-input>";
      cell3.innerHTML = "<paper-input type=text name='Qty[]' value=0 onchange='update()'></paper-input>";
      cell4.innerHTML = "<paper-input type=text name='Rate[]' value=0 onchange='update()'></paper-input>";
      cell5.innerHTML = "";
      var butto = "<paper-button type='button' onclick='Remo(" + (x-1) + ")'><img src = '../img/delete_24.png'></img></paper-button>";
      cell6.innerHTML = butto;
      update();

  }
</script>
<?php
	_Footer();
 ?>
