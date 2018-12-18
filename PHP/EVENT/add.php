<?php
	require_once "../function.php";
	connectDB();
		
	if( isset($_POST['comments']))
	{
		mysql_query(addCommentsForComputer( $_POST['user'], $_POST['number'], $_POST['comments']));
		$no = $_POST['number'];
		
		echo $_POST['user'];
		echo $_POST['number'];
		echo $_POST['comments'];
		
		unset($_POST['user']);
		unset($_POST['number']);
		unset($_POST['comments']);
		
		header("Location: ../../detailsOfComputer.php?number=".$no."");
	}else{
		
		mysql_close();
		header("Location: ../../index.php");
	}
?>