<?php
require_once("../includes/global.php");
function payment_table(){
	echo '<table border="1" >
			<tr>
				<th>Payment ID</th>
				<th>Date</th>
				<th>Customer ID</th>
				<th>Amount</th>
			</tr>';
}

function payment_details($row){
	//echo $fdata[0];
	echo '<tr>
    <td>'.$row["Payment_ID"].'</td>
    <td>'.$row["Date"].'</td>
    <td>'.$row["Cust_ID"].'</td>
    <td>'.$row["Amount"].'</td>
    <td><button id="submit" type="submit"><a href="removePayment.php?query='.$row["Payment_ID"].'">Remove Payment</a></button></td>
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
	echo "</table>";
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
