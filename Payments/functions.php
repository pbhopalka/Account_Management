<?php
require_once("../includes/global.php");
function payment_table(){
	echo '<div class="table-responsive-vertical shadow-z-1">
	  <!-- Table starts here -->
	  <table id="table" class="table table-hover table-mc-light-blue">
	      <thead>
	        <tr>
	          <th>Payment ID</th>
	          <th>Date</th>
	          <th>Cust Name</th>
	          <th>Amount</th>
	        </tr>
	      </thead>
	      <tbody>';
}

function payment_details($row, $cust_name){
	//echo $fdata[0];
	echo '<tr>
    <td data-title="ID">'.$row["Payment_ID"].'</td>
    <td data-title="Date">'.$row["Date"].'</td>
    <td data-title="Cust Name">'.$cust_name.'</td>
    <td data-title="Amount">'.$row["Amount"].'</td>
    <td><a href="removePayment.php?query='.$row["Payment_ID"].'"><img src = "../img/delete_24.png"></img></a></td>
  </tr>';
}

/*if (isset($_GET['remove_payment'])){
	//echo $_GET['remove_payment'];
	//die();

	if(removePayment($_GET['remove_payment'])){
		echo "Success";
		die();
	}
	else {
		echo "False";
		die();
	}
}*/

function end_table(){
	echo '</tbody>
	</table>
</div>';
}

/*function removePayment($data){
	$sql = "DELETE FROM payment_record WHERE Payment_ID = {$data}";
	echo $sql;
	$arr=array();
	$result = $mysqli->query($sql);
	echo '$result';
	header('Location: viewPayment.php');
	/*$result = $mysqli->query($sql);
	while($row=$result->fetch_assoc()){
		$arr[]=$row;
	}
	return $arr;
}*/
?>
