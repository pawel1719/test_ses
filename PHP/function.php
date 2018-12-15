<?php

function addCommentsForComputer($user, $computer, $comments){
	
	$date = date('Y-m-d H:i:s');
	$comments = htmlentities($comments);
	
	$sql = "INSERT INTO comments (idPerson, idComputers, idDevice, Comment, DateAdd) 
			VALUES ('$user', '$computer', NULL, '$comments', '$date');";
			
	return $sql;
}//end function addComments to the table in data base


function yesORno( $number )
{	
	if($number == 1){ 
		return 'Tak'; 
	}else{		
		return 'Nie';
	}

}//end function yesORnot for view

function true( $value )
{
	return $value;
}

//LIST TO HTML FOR VALUE 0 as FALSE and 1 as TRUE
function dropDownListForTrueOrFalseToHTML( $name_label, $default ){
    
    $tab[0] = 0;
	$tab[1] = 1;
	$HTML = "<select name=\"$name_label\">";
    $counter = 0;

	while( $counter < count($tab) ){
		
		//SELECTED DEFAULT VALUE
        if($tab[$counter]== $default){ 
            //return word Tak or Nie to the dropdown list 
            if($tab[$counter]==1){
            	$HTML = $HTML."\n\t<option value=\"$tab[$counter]\" selected>Tak</option>";
            }else{
            	$HTML = $HTML."\n\t<option value=\"$tab[$counter]\" selected>Nie</option>";
            }
        }else{
        	//return word Tak or Nie to the dropdown list 
        	if($tab[$counter]==1){
	            $HTML = $HTML."\n\t<option value=\"$tab[$counter]\">Tak</option>";
	        }else{
	        	$HTML = $HTML."\n\t<option value=\"$tab[$counter]\">Nie</option>";
	        }
        }
		$counter++;   
	}//end loop

	$HTML = $HTML."\n</select>";
	return $HTML;

}//end function dropDownList


//FUNCTION RETURN DROPDOWN LIST TO HTML WITH DEFAULT VALUE
function dropDownListForTableOperatingSystemToHTML($name_label, $default)
{
	connectDB();
	//downloading data from the database
	$SQL = "SELECT sys.idOperatingSystem 'ID_Sys', sys.Name 'Nazwa' FROM operatingsystem sys;";
	$query = mysql_query( $SQL );
	$HTML = "<select name=\"$name_label\">";


	//Create list with date on DataBase
	while( $row = mysql_fetch_assoc($query))
	{
		if($row['Nazwa']==$default){
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Sys']."\" selected>".$row['Nazwa']."</option>";
		}else{
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Sys']."\">".$row['Nazwa']."</option>";
		}
	}
	
	$HTML = $HTML."\n</select>";
	mysql_free_result($query);

	return $HTML;
}//end function dropDownListForTableOperatingSystemToHTML


//FUNCTION RETURN DROPDOWN LIST TO HTML DEFAULT VALUSE
function dropDownListForTableStatusToHTML($name_label, $default){

	connectDB();

	//downloading data from the database
	$sql = "SELECT  stat.idStatusComputer 'ID_Status', stat.Status 'Status' FROM statuscomputer stat;";
	$query = mysql_query($sql);
	$HTML = "\n<select name=\"$name_label\">";


	//Create list with date on DataBase
	while( $row = mysql_fetch_assoc($query) )
	{
		if($row['Status'] == $default){
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Status']."\" selected>".$row['Status']."</option>";
		}else{
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Status']."\">".$row['Status']."</option>";
		}
	}

	$HTML = $HTML."\n</select>\n";
	mysql_free_result($query);

	return $HTML;
}//end function dropDownListForTableStatusToHTML


//FUNCTION RETURN DROPDOWN LIST TO HTML DEFAULT VALUSE
function dropDownListForTableTypeToHTML($name_label, $default){

	connectDB();
	//downloading data from the database
	$sql = "SELECT typ.idTypeOfDevice 'ID_Type', typ.Type 'Type'FROM typeofdevice typ;";
	$query = mysql_query($sql);
	$HTML = "\n<select name=\"$name_label\">";

	//Create list with date on DataBase
	while( $row = mysql_fetch_assoc($query) )
	{
		if($row['Type'] == $default){
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Type']."\" selected>".$row['Type']."</option>";
		}else{
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Type']."\">".$row['Type']."</option>";
		}
	}

	$HTML = $HTML."\n</select>\n";
	mysql_free_result($query);

	return $HTML;
}//end function dropDownListForTableTypeToHTML



//FUNCTION RETURN DROPDOWN LIST TO HTML DEFAULT VALUSE
function dropDownListForTableProducerToHTML($name_label, $default){

	connectDB();
	//downloading data from the database
	$sql = "SELECT 	prod.idProducerDevice 'ID_Prod', prod.Producer 'Producent' FROM producerdevice prod;";
	$query = mysql_query($sql);
	$HTML = "<select name=\"$name_label\">";


	//Create list with date on DataBase
	while( $row = mysql_fetch_assoc($query) )
	{
		if($row['Producent'] == $default){
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Prod']."\" selected>".$row['Producent']."</option>";
		}else{
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Prod']."\">".$row['Producent']."</option>";
		}
	}

	$HTML = $HTML."\n</select>";
	mysql_free_result($query);

	return $HTML;
}//end function dropDownListForTableProducerToHTML



function dropDownListForTablePersonToHTML($name_label, $default){

	connectDB();
	//downloading data from the database
	$sql = "SELECT 	 p.idPerson 'ID_Uzytkownik',CONCAT(p.Surname, ' ', p.Name) 'Uzytkownik' FROM person p WHERE p.Work = 1 ORDER BY Surname ASC;";
	$query = mysql_query($sql);
	$HTML = "<select name=\"$name_label\">";


	//Create list with date on DataBase
	while( $row = mysql_fetch_assoc($query) )
	{
		if($row['Uzytkownik'] == $default){
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Uzytkownik']."\" selected>".$row['Uzytkownik']."</option>";
		}else{
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Uzytkownik']."\">".$row['Uzytkownik']."</option>";
		}
	}

	$HTML = $HTML."\n</select>";
	mysql_free_result($query);

	return $HTML;
}//end function dropDownListForTableProducerToHTML



//FUNCTION RETURN DROPDOWN LIST TO HTML DEFAULT VALUSE
function dropDownListForTableModelToHTML($name_label, $default){

	connectDB();
	//downloading data from the database
	$sql = "SELECT model.idModelsDevice 'ID_Model', Producer 'Model' FROM modelsdevice model;";
	$query = mysql_query($sql);
	$HTML = "<select name=\"$name_label\">";

	
	//Create list with date on DataBase
	while( $row = mysql_fetch_assoc($query) )
	{
		if($row['Model'] == $default){
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Model']."\" selected>".$row['Model']."</option>";
		}else{
			$HTML = $HTML."\n\t<option value=\"".$row['ID_Model']."\">".$row['Model']."</option>";
		}
	}

	$HTML = $HTML."\n</select>";
	mysql_free_result($query);

	return $HTML;
}//end function dropDownListForTableProducerToHTML


//RETURNS A LIST OF TYPICAL VALUES OF RAM MEMORY
function dropDownListRAMToHTML( $label, $default )
{
	$HTML = "<select name=\"$label\">";

	if( strlen($default) < 1){
			$HTML = $HTML."\n\t\t<option value=\"\" selected>Wybierz</option>"; 
		}


	//VALUES BETWEEN 1GB AND 64GB
	for($i = 0; $i < 7; $i++)
	{
		$tmp = pow(2, $i)." GB";

		if($tmp == $default) { 
			$HTML = $HTML."\n\t\t<option value=\"$tmp\" selected>$tmp</option>"; 
		}else { 
			$HTML = $HTML."\n\t\t<option value=\"$tmp\">$tmp</option>"; 
		}
	}
	$HTML = $HTML."</select>";

	return $HTML;
}//end function dropDownListRAMToHTML


//RETURS A LIST OF TYPICAL VALUES OF DISPLAYS FROM THE ARRAY
function dropDownListDisplayToHTML( $label, $default )
{
	$DISPLAYS = [
		 '800×600'
		,'1024×768'
		,'1280×720'  
		,'1366×768'
		,'1280×800'  
		,'1440×900'  
		,'1280×1024'
		,'1600×1024'
		,'1400×1050'
		,'1024×600'  
		,'1680×1050'
		,'1600×1200'
		,'1600×900'  
		,'1920×1080'
		,'1920×1200'
		,'2048×1152'
		,'2048×1536'];

	$HTML = "<select name=\"$label\">";

	//for empty values
	if(strlen($default) < 1){
		$HTML = $HTML."\n\t\t<option value=\"\" selected>Brak</option>";
	}
	//values ​​from the array
	for( $i = 0; count($DISPLAYS) > $i; $i++)
	{
		if($DISPLAYS[$i] == $default){
			$HTML = $HTML."\n\t\t<option value=\"".$DISPLAYS[$i]."\" selected>".$DISPLAYS[$i]."</option>";
		}else{
			$HTML = $HTML."\n\t\t<option value=\"".$DISPLAYS[$i]."\">".$DISPLAYS[$i]."</option>";
		}
	}
		

	$HTML = $HTML."</select>";

	return $HTML;
}//end function dropDownListDisplayToHTML


//RETURNS A LIST OF TYPES OF HARD DISK
function dropDownListTypeHardDiskToHTML( $label, $default )
{
	$HTML = "<select name = \"$label\">";

		if($default == "SSD"){ 
			$HTML = $HTML."\n\t\t<option value = \"SSD\" selected>SSD</option>";
		}else{ 
			$HTML = $HTML."\n\t\t<option value = \"SSD\">SSD</option>"; }


		if($default == "HDD"){ 
			$HTML = $HTML."\n\t\t<option value = \"HDD\" selected>HDD</option>"; 
		}else{ 
			$HTML = $HTML."\n\t\t<option value = \"HDD\">HDD</option>"; }


		if($default == ""){ 
			$HTML = $HTML."\n\t\t<option value = \"\" selected>Brak</option>"; }


	$HTML = $HTML."</select>";

	return $HTML;
}//end function dropDownListTypeHardDiskToHTML



function getTheValue( $typeValue, $nameValue, $prefixes, $default)
{
	$HTML = "<input  type=\"$typeValue\" value=\"$default\" name=\"$nameValue\" /> $prefixes";

	return $HTML;
}//end function getTheValue

function showTheValue( $value, $prefix)
{
	if( strlen($value) > 1 ){
		return $value." ".$prefix;
	}else{
		return "";
	}
}//end function showTheValue


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