<html>
<head>
  <title>ACMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <script src="trying_design/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

  <link rel="import" href="trying_design/bower_components/iron-icons/iron-icons.html">
  <link rel="import" href="trying_design/bower_components/paper-toolbar/paper-toolbar.html">
  <link rel="import" href="trying_design/bower_components/font-roboto/roboto.html">
  <link rel="import" href="trying_design/bower_components/paper-button/paper-button.html">
  <link rel="import" href="trying_design/bower_components/neon-animation/neon-animation.html">
  <link rel="import" href="trying_design/bower_components/paper-card/paper-card.html">
  <link rel="import" href="trying_design/bower_components/paper-checkbox/paper-checkbox.html">
  <link rel="import" href="trying_design/bower_components/paper-icon-button/paper-icon-button.html">
  <link rel="import" href="trying_design/bower_components/paper-fab/paper-fab.html">
  <link rel="import" href="trying_design/bower_components/paper-tabs/paper-tabs.html">
  <link rel="import" href="trying_design/bower_components/paper-toast/paper-toast.html">
  <link rel="import" href="trying_design/bower_components/paper-dialog/paper-dialog.html">
  <link rel="import" href="trying_design/bower_components/paper-tooltip/paper-tooltip.html">
  <link rel="import" href="trying_design/bower_components/paper-styles/color.html">

  <link rel="stylesheet" href="trying_design/styles.css">

  <style is="custom-style">
  body {
    background-color: var(--paper-grey-50);
  }
  #cards {
    @apply(--layout-vertical);
    @apply(--center-justified);
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
  }
  paper-card {
    width: 100%;
    margin-bottom: 16px;
  }
  .avatar {
    display: inline-block;
    height: 64px;
    width: 64px;
    border-radius: 50%;
    background: var(--paper-pink-500);
    color: white;
    line-height: 64px;
    font-size: 30px;
    text-align: center;
  }
  .fancy .title {
    position: absolute;
    top: 30px;
    left: 100px;
    color: var(--paper-indigo-500);
  }
  .fancy img {
    width: 100%;
  }
  .fancy .big {
    font-size: 22px;
    padding: 8px 0 16px;
    color: var(--google-grey-500);
  }
  .fancy .medium {
    font-size: 16px;
    padding-bottom: 8px;
  }
  .pink {
    --paper-card-header-color: var(--paper-pink-500);
  }
  #customers{
    float:right;
  }
</style>

</head>
<body unresolved>
  <paper-toolbar>
    <paper-icon-button icon="menu"></paper-icon-button>
    <span class="flex">Superuser Page</span>


   <section onclick="clickHandler(event)">
       <paper-icon-button id="logout" src="img/logout.png"data-dialog="modal">-></paper-icon-button>
       <paper-tooltip for="logout" offset="0">Logout </paper-tooltip>
     <!--Choose the appropriate data-dialog: either animated or modal-->
      <!--<paper-button data-dialog="modal" raised right>Logout</paper-button>-->

    <!--Animation Dialog box-->
      <paper-dialog id="animated" entry-animation="scale-up-animation" exit-animation="fade-out-animation" with-backdrop>
        <h2>Logout</h2>
        <p>Are you sure you want to logout?</p>
        <div class="buttons">
          <paper-button dialog-confirm autofocus onclick="location.href='logout.php'">Yes</paper-button>
          <paper-button dialog-dismiss>No</paper-button>
        </div>
    </paper-dialog>

    <!--Modal Dialog box-->
    <paper-dialog id="modal" modal>
     <p>Are you sure you want to logout?</p>
     <div class="buttons">
       <paper-button dialog-confirm autofocus onclick="location.href='logout.php'">Yes</paper-button>
       <paper-button dialog-dismiss>No</paper-button>
     </div>
   </paper-dialog>
  </section>
  </paper-toolbar>

<div id="cards">
  <div id="customers" >
  <paper-card heading="Customers">
    <paper-fab icon="add" onclick="location.href='Customers/AddCust.php'" class="green"></paper-fab>
    <div class="card-actions">
      <paper-button onclick="location.href='Customers/ShowCust.php'"view>View</paper-button>
    </div>
  </paper-card>

  <paper-card heading="Bills">
    <paper-fab icon="add" onclick="location.href='Bills/AddBill.php'"></paper-fab>
    <div class="card-actions">
      <paper-button onclick="location.href='Bills/ShowBills.php'"view>View</paper-button>
    </div>
  </paper-card>
</div>

  <paper-card heading="Payments">
    <paper-fab icon="add" onclick="location.href='Payments/addPayment.php'"class="blue"></paper-fab>
    <div class="card-actions">
      <paper-button onclick="location.href='Payments/viewPayment.php'"view>View</paper-button>
    </div>
  </paper-card>

  <paper-card heading="Ledger">
  <div class="card-actions">
    <paper-button onclick="location.href='Ledger/ViewLedger.php'">View</paper-button>
  </div>
</paper-card>

</div>
<!--
  <button id="logout" type="submit"><a href="logout.php">Logout</a></button><br>
  <button id="AddCust" type="submit"><a href="Customers/AddCust.php">Add Customer</a></button><br>
  <button id="ViewCust" type="submit"><a href="Customers/ShowCust.php">View Customers</a></button><br>
  <button id="AddPayment" type="submit"><a href="Payments/addPayment.php">Make Payment</a></button><br>
  <button id="viewPayment" type="submit"><a href="Payments/viewPayment.php">View Payment</a></button><br>
  <button id="AddBill" type="submit"><a href="Bills/AddBill.php">Add a Bill Details</a></button><br>
  <button id="ShowBills" type="submit"><a href="Bills/ShowBills.php">Show Bill Details</a></button><br>
  <button id="ledger" type="submit"><a href="Ledger/ViewLedger.php">View Ledger</a></button><br>



  <script>
 function decreaseShadow() {
   var card = document.querySelector('#shadow_demo');
   card.elevation = card.elevation > 0 ? card.elevation - 1 : 0;
 }
 function increaseShadow() {
   var card = document.querySelector('#shadow_demo');
   card.elevation = card.elevation < 5 ? card.elevation + 1 : 5;
 }
</script>-->

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


<script src="trying_design/main.js"></script>
</body>
</html>
