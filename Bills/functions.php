<?php
function _Header($page) {
    
    if($page=='BillA'){
		echo "<HTML><HEAD><TITLE>Add New Bill</TITLE></HEAD><BODY>";
		echo "<h4>Add New Bill</h4> ";
	}
	
}

function _Footer() {
    echo "</BODY></HTML>";
}


function makeform($act){
	echo "<form method='post' action=$act>";
}
function item($Text,$type,$name,$val=""){
	echo "$Text <input type=$type name=$name><br><br>";
}
function endform(){
	echo "</form>";
}

function _link($a,$b){
	echo"<button id=$b type=submit><a href='$b'>$a</a></button><br>";
}


function end_table(){
	echo "</table>";
}
?>

