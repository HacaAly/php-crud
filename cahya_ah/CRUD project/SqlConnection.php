<?php
	$connection = mysqli_connect("localhost", "root","","keuangan");
	
	//Check connection
	if (mysqli_connect_errno()){
		echo "failed connection database : " . mysql_connect_error();
	}else {
		echo "Connection Success";
	}
?>