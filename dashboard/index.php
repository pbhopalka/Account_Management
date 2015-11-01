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
    <title>ACMS - Dashboard</title>

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

    <link rel="shortcut icon" href="images/favicon.png" />

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

    <link rel="stylesheet" href="material.min.css">
    <link rel="stylesheet" href="styles.css">

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

          <span class="mdl-layout-title">Admin Panel</span>
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
          <div style="padding: 3px;"></div>
          <label class="mdl-button mdl-js-button mdl-button--icon" for="logout">
            <a href="../logout.php"><img src="../img/logout.png"></a>
          </label>

        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="images/user.jpg" class="demo-avatar">
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
          <a class="mdl-navigation__link" href="index.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
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
              <h5 class="title-text">Today's Ledger</h5>
            </div>
            <div style="width: 50%; margin-right: 0px; float:right;">
              <?php
                date_default_timezone_set('Kolkata');
                $day = date("l");
                $date = date("l jS \of F Y");
              ?>
              <h5 style="text-align: right;"><?php echo $date;?></h5>
            </div>
          </div>
          <div class="demo-card mdl-cell mdl-cell--12-col mdl-grid">
            <div style="margin-left: 2px; margin-right: 2px;">
              <a href="../Bills/AddBill.php" id="Bills"
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">
                New Bill
              </a>
            </div>
            <div style="margin-left: 2px; margin-right: 2px;">
              <a href="../Payments/addPayment.php" id="Bills"
              class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">
              New Payment</a>
            </div>
          </div>


          <div class="demo-cards mdl-color--white mdl-cell mdl-cell--6-col  mdl-cell--8-col-tablet">
          <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
            <h2 class="mdl-card__title-text">Payments</h2>
          </div>
          <paper-material id="table-material" class="table-condensed">

    <?php
    require_once("../Payments/functions.php");
    $date = date("Y\-m\-d");
    //echo $date;echo'<br>';
    $sql = "SELECT * FROM payment_record WHERE Date='{$date}'";
    //echo $sql;
    $result = $mysqli->query($sql);
    if ($result->num_rows <=0){
      $sql = "ALTER TABLE payment_record auto_increment = 1";
      $result = $mysqli->query($sql);
      echo '<p style="font-weight: 400; text-align: center; padding-top: 32px;">No payment entries. Press the Add button to add entries.</p><br>';
    }
    else{
      echo '<div class="table-responsive-vertical shadow-z-1">
    	  <!-- Table starts here -->
    	  <table id="table" class="table table-hover table-mc-light-blue">
    	      <thead>
    	        <tr>
    	          <th>Payment ID</th>
    	          <th>Cust Name</th>
    	          <th>Amount</th>
    	        </tr>
    	      </thead>
    	      <tbody>';
      while ($row=$result->fetch_assoc()){
        $cust_id = $row['Cust_ID'];
        $sql = "SELECT Cust_Name FROM customer_details WHERE Cust_ID = {$cust_id}";
        $result2 = $mysqli->query($sql);
        $row2 = $result2->fetch_assoc();
        $cust_name = $row2['Cust_Name'];
        echo '<tr>
          <td data-title="ID">'.$row["Payment_ID"].'</td>
          <td data-title="Cust Name">'.$cust_name.'</td>
          <td data-title="Amount">'.$row["Amount"].'</td>
          <td><a href="../Payments/removePayment.php?query='.$row["Payment_ID"].'"><img src = "../img/delete_24.png"></img></a></td>
        </tr>';
        //payment_details($row, $cust_name);
        echo '<br>';
      }
      end_table();
    }
  ?>
          <div class="mdl-card__actions mdl-card--border">
            <a href="../Ledger/ViewLedger.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">More</a>
          </div>
          </paper-material>
          </div>

          <div class="demo-cards mdl-color--white mdl-cell mdl-cell--6-col  mdl-cell--8-col-tablet">
          <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
            <h2 class="mdl-card__title-text">Bills</h2>
          </div>
          <paper-material id="table-material" class="table-condensed">

    <?php
    require_once("../Payments/functions.php");
    $date = date("Y\-m\-d");
    //echo $date;echo'<br>';
    $sql = "SELECT * FROM bill_record WHERE Date='{$date}'";
    //echo $sql;
    $result = $mysqli->query($sql);
    if ($result->num_rows <=0){
      $sql = "ALTER TABLE payment_record auto_increment = 1";
      $result = $mysqli->query($sql);
      echo '<p style="font-weight: 400; text-align: center; padding-top: 32px;">No payment entries. Press the Add button to add entries.</p><br>';
    }
    else{
      echo '<div class="table-responsive-vertical shadow-z-1">
    	  <!-- Table starts here -->
    	  <table id="table" class="table table-hover table-mc-light-blue">
    	      <thead>
    	        <tr>
    	          <th>Bill ID</th>
    	          <th>Cust Name</th>
    	          <th>Amount</th>
    	        </tr>
    	      </thead>
    	      <tbody>';
      while ($row=$result->fetch_assoc()){
        $cust_id = $row['Cust_ID'];
        $sql = "SELECT Cust_Name FROM customer_details WHERE Cust_ID = {$cust_id}";
        $result2 = $mysqli->query($sql);
        $row2 = $result2->fetch_assoc();
        $cust_name = $row2['Cust_Name'];
        echo '<tr>
          <td data-title="ID">'.$row["Bill_ID"].'</td>
          <td data-title="Cust Name">'.$cust_name.'</td>
          <td data-title="Amount">'.$row["Amount"].'</td>
          <td><a href="../Bills/removeBill.php?query='.$row["Bill_ID"].'"><img src = "../img/delete_24.png"></img></a></td>
        </tr>';
        //payment_details($row, $cust_name);
        echo '<br>';
      }
      end_table();
    }
  ?>

          <div class="mdl-card__actions mdl-card--border">
            <a href="../Ledger/ViewLedger.php" class="mdl-button mdl-js-button mdl-js-ripple-effect">More</a>
          </div>
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
    <script src="material.min.js"></script>
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
