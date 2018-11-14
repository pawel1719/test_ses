<?php

function addComments($user, $computer, $comments){
	
	$date = date('Y-m-d H:i:s');
	
	$sql = "INSERT INTO comments (idPerson, idComputers, idDevice, Comment, DateAdd) 
			VALUES ('$user', '$computer', NULL, '$comments', '$date');";
			
	return $sql;
}//end function addComments

function yesORno( $number ){
	
	if($number == 1)
	{ 
		return 'Tak'; 
	}else{		
		return 'Nie';
	}
	
}//end function yesORnot


function connectDB(){
	//DATA TO CONNECTION DATABASE 
	$db = mysql_connect("localhost","root","");
	
	if(!$db){
		
		die("Nie można się połączyć z serwerem bazy danych!");
		
	}else{
		
		//SELECT DATABASE
		$selectDB = mysql_select_db('test_ewidencja');
		if($selectDB)
		{
			mysql_set_charset('utf8',$db);
			$encoding = mysql_query("SET NAME utf8");
			return true;
			
		}else{
			
			echo "BRAK POLACZENIA Z BAZĄ DANYCH";
			return false;	
		}//select DB
	}//connect to DB
	
}//end function connectDB
?>
