<?php
  require_once("../includes/global.php");
  //require_once("functions.php");
  //echo $_SESSION['username'];
  //echo 'something';
  ?>
<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ledger</title>

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

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <script src="../trying_design/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="import" href="../trying_design/bower_components/iron-icons/iron-icons.html">
    <link rel="import" href="../trying_design/bower_components/paper-toolbar/paper-toolbar.html">
    <link rel="import" href="../trying_design/bower_components/font-roboto/roboto.html">
    <link rel="import" href="../trying_design/bower_components/paper-button/paper-button.html">
    <link rel="import" href="../trying_design/bower_components/neon-animation/neon-animation.html">
    <link rel="import" href="../trying_design/bower_components/paper-card/paper-card.html">
    <link rel="import" href="../trying_design/bower_components/paper-checkbox/paper-checkbox.html">
    <link rel="import" href="../trying_design/bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="../trying_design/bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="../trying_design/bower_components/paper-tabs/paper-tabs.html">
    <link rel="import" href="../trying_design/bower_components/paper-toast/paper-toast.html">
    <link rel="import" href="../trying_design/bower_components/paper-dialog/paper-dialog.html">
    <link rel="import" href="../trying_design/bower_components/paper-tooltip/paper-tooltip.html">
    <link rel="import" href="../trying_design/bower_components/paper-styles/color.html">
    <link rel="stylesheet" href="../trying_design/styles.css">
    <link rel="stylesheet" href="../includes/table.less">

    <link rel="stylesheet" href="../dashboard/material.min.css">
    <link rel="stylesheet" href="../dashboard/styles.css">

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
    </style>

  </head>
  <body unresolved>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600" style="background-color: rgb(63, 81, 181); color: #ffffff;">

        <div class="mdl-layout__header-row" style="background-color: rgb(63, 81, 181); color: #ffffff;">

          <span class="mdl-layout-title">Ledger</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <img src ="../img/magnify.png"/>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search" />
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>

        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="../dashboard/images/user.jpg" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span>Welcome <?php
                $sql = "SELECT Name FROM manager WHERE Username='{$_SESSION['username']}'";
                //echo $sql;
                $result = $mysqli->query($sql);
                $result = $result->fetch_assoc();
                echo $result['Name'];
              ?></span>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="../index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
          <a class="mdl-navigation__link" href="../Customers/ShowCust.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Customers</a>
          <a class="mdl-navigation__link" href="../Bills/ShowBills.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Bills</a>
          <a class="mdl-navigation__link" href="../Payments/viewPayment.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">payment</i>Payments</a>
          <a class="mdl-navigation__link" href="../Ledger/ViewLedger.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Ledger</a>
          <div class="mdl-layout-spacer"></div>
<!--Add help here -->
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-card mdl-cell mdl-cell--12-col mdl-grid">
            <div style="width: 40%; float: left; padding-left: 10px;">
              <h5 class="title-text">Total Payment Received</h5>
							<?php
								$sql = "SELECT SUM(Payment_Received) AS sum FROM ledger";
								$result = $mysqli->query($sql);
								$result = $result->fetch_assoc();
								echo $result['sum'];
							?>
            </div>
            <div style="width: 50%; margin-right: 0px; float:right; text-align: right">
              <h5 class="title-text" style="text-align: right;">Total Bill Amount</h5>
							<?php
								$sql = "SELECT SUM(Bill_Amount) AS sum FROM ledger";
								$result = $mysqli->query($sql);
								$result = $result->fetch_assoc();
								echo $result['sum'];
              ?>
            </div>
          </div>

					<div class="demo-card mdl-cell mdl-cell--12-col mdl-grid">
						<paper-material id="table-material" class="table-condensed" style="width: 100%;">

							<?php


							require_once('functions.php');

							$sql = "SELECT * From ledger;";
							//echo $sql."<br>";
							$result = $mysqli->query($sql);
							//echo "Query Called";
							while($row = $result->fetch_assoc()){
								$date = $row['Date'];
								//echo $row['Payment_Received'];
								//echo $row['Bill_Amount'];
								if ($row['Payment_Received'] == 0 && $row['Bill_Amount'] == 0){
									$sql = "DELETE FROM ledger WHERE Date = '{$date}'";
									$r = $mysqli->query($sql);
									//echo $sql;

								}
							}
							$sql = "SELECT * From ledger;";
							$result = $mysqli->query($sql);
							if($result->num_rows > 0){
								table_l();
								while($row = $result->fetch_assoc()){
									l_details($row);
								}
								end_table();
							}
							else
								echo "No Transactions Yet<br>";

							?>
	          </paper-material>
					</div>


        <!--  <div class="demo-cards mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">Updates</h2>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                Non dolore elit adipisicing ea reprehenderit consectetur culpa.
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>
              </div>
            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">
                <h3>View options</h3>
                <ul>
                  <li>
                    <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox1" class="mdl-checkbox__input" />
                      <span class="mdl-checkbox__label">Click per object</span>
                    </label>
                  </li>
                  <li>
                    <label for="chkbox2" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox2" class="mdl-checkbox__input" />
                      <span class="mdl-checkbox__label">Views per object</span>
                    </label>
                  </li>
                  <li>
                    <label for="chkbox3" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox3" class="mdl-checkbox__input" />
                      <span class="mdl-checkbox__label">Objects selected</span>
                    </label>
                  </li>
                  <li>
                    <label for="chkbox4" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
                      <input type="checkbox" id="chkbox4" class="mdl-checkbox__input" />
                      <span class="mdl-checkbox__label">Objects viewed</span>
                    </label>
                  </li>
                </ul>
              </div>
              <div class="mdl-card__actions mdl-card--border">
                <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Change location</a>
                <div class="mdl-layout-spacer"></div>
                <i class="material-icons">location_on</i>
              </div>
            </div>
          </div>-->
        </div>
      </main>
    </div>

    <!--  <a href="../Bills/AddBill.php"
      target="_blank" id="view-source"
      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">
      Add Bill</a>-->
    <script src="../dashboard/material.min.js"></script>
    <!--For logout dialog box-->
    <script>
        function clickHandler(e) {
          var button = e.target;
          while (!button.hasAttribute('data-dialog') && button !== document.body) {
            button = button.parentElement;
          }
          if (!button.hasAttribute('data-dialog')) {
            return;
          }
          var id = button.getAttribute('data-dialog');
          var dialog = document.getElementById(id);
          if (dialog) {
            dialog.open();
          }
        }
      </script>
  </body>
</html>

<?php

/*
require_once('functions.php');

_Header("L", "");
require_once("../includes/global.php");

$sql = "SELECT * From ledger;";
//echo $sql."<br>";
$result = $mysqli->query($sql);
//echo "Query Called";
while($row = $result->fetch_assoc()){
	$date = $row['Date'];
	//echo $row['Payment_Received'];
	//echo $row['Bill_Amount'];
	if ($row['Payment_Received'] == 0 && $row['Bill_Amount'] == 0){
		$sql = "DELETE FROM ledger WHERE Date = '{$date}'";
		$r = $mysqli->query($sql);
		//echo $sql;

	}
}
$sql = "SELECT * From ledger;";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
	table_l();
	while($row = $result->fetch_assoc()){
		l_details($row);
	}
	end_table();
}
else
	echo "No Transactions Yet<br>";


_Footer();
*/
?>
