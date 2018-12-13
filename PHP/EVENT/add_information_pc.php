<?php
	require_once "../function.php";
	connectDB();
		
	if( isset($_POST['PC_Nazwa']) && isset($_POST['PC_CzyZaszyfrowany']) && isset($_POST['PC_number']))
	{
		$no = $_POST['PC_number'];
		$toChange = '';


		$sql = "SELECT 	 pc.idComputers 'ID_PC'
						,pc.idTypeOfDevice 'ID_Urzadzenie'
				        ,typ.Type 'Urzadzenie'
                        ,pc.idProducerDevice 'ID_Producent'
				        ,prod.Producer  'Producent'
                        ,pc.idModelsDevice 'ID_Model'
				        ,model.Producer 'Model'
				        ,pc.ComputerName 'Nazwa'
				        ,pc.SerialNumber 'SN'
                        ,pc.OperatingSystem 'ID_System'
				        ,os.Name  'System'
				        ,pc.idPerson 'ID_Osoby'
				        ,per.Surname 'Nazwisko'
				        ,per.Name 'Imie'
                        ,pc.idStatusComputer 'ID_Status'
				        ,stat.Status 'Status'
				        ,pc.Encrypted 'Czy_zaszyfrowany'
				        ,pc.IdentifierBitLocker 'Identyfikatro_BitLocker'
				        ,pc.RecoveryKeyBitLocker 'Klucz_BitLocker'
				        ,pc.PasswordEncrypted 'Haslo'
				        ,pc.DateEncrypted 'Data_szyfrowania'
				        ,pc.MacEthernet 'Mac_ETH'
				        ,pc.MacWiFi 'Mac_ETH2'
				        ,pc.idOffice 'ID_Office'
				        ,ms.KeyOffline  'Klucz_offica'
				        ,ms.DateAdd 'Data_dodania'
				        ,ms.Office 'Office'
				        ,ms.Version 'Wersja'
				        ,pc.idInvoice 'ID_faktury'
				        ,fv.NumberInvoice 'Nr_faktury'
				        ,fv.Date 'Data_faktury'
				        ,fv.GrosPrice 'Cena'
				        ,pc.Warranty 'Gwarancja'
				        ,pc.CPU 'Procesor'
				        ,pc.NumberOfCores 'Liczba_watkow'
				        ,pc.RAMMemory 'Ilosc_RAMu'
				        ,pc.HardDriveType_1 'Rodzaj_dysku_1'
				        ,pc.HardDriveCapacity_1 'Rozmiar_dysku_1'
				        ,pc.HardDriveType_2 'Rodzaj_dysku_2'
				        ,pc.HardDriveCapacity_2 'Rozmiar_dysku_2'
				        ,pc.Grapfic 'Grafika'
				        ,pc.DisplayResolution 'Rozdzielczosc'
				FROM computers pc LEFT JOIN typeofdevice typ ON pc.idTypeOfDevice=typ.idTypeOfDevice
			  	LEFT JOIN producerdevice prod ON  pc.idProducerDevice=prod.idProducerDevice
                LEFT JOIN modelsdevice model ON pc.idModelsDevice=model.idModelsDevice
                LEFT JOIN OperatingSystem os ON pc.OperatingSystem=os.idOperatingSystem
                LEFT JOIN person per ON pc.idPerson=per.idPerson
                LEFT JOIN statuscomputer stat ON pc.idStatusComputer=stat.idStatusComputer
                LEFT JOIN office ms ON pc.idOffice=ms.idOffice
                LEFT JOIN invoice fv ON pc.idInvoice=fv.idInvoice
				WHERE pc.idComputers = ".$no;				


		$_POST['PC_Nazwa'] = htmlentities($_POST['PC_Nazwa']);
		$_POST['PC_IdentyfikatorBitLocker'] = htmlentities($_POST['PC_IdentyfikatorBitLocker']);
		$_POST['PC_KluczBitLocker'] = htmlentities($_POST['PC_KluczBitLocker']);
		$_POST['PC_HasloBitLocker'] = htmlentities($_POST['PC_HasloBitLocker']);
		$_POST['PC_Procesor'] = htmlentities($_POST['PC_Procesor']);
		$_POST['PC_Grafika'] = htmlentities($_POST['PC_Grafika']);


		$query = mysql_query($sql);
		$row = mysql_fetch_assoc($query);
		

		if( strcmp($row['Nazwa'], $_POST['PC_Nazwa']) != 0 ) 
		{ 	$toChange = $toChange."\n ComputerName = '".$_POST['PC_Nazwa']."',";	}

		if( strcmp($row['ID_Producent'], $_POST['PC_Producent']) !=0 ) 
		{	$toChange = $toChange."\n idProducerDevice = ".$_POST['PC_Producent'].","; }

		if( strcmp($row['ID_Model'], $_POST['PC_Model']) != 0 ) 
		{	$toChange = $toChange."\n idModelsDevice = ".$_POST['PC_Model'].","; }

		if( strcmp($row['ID_Osoby'], $_POST['PC_Uzytkownik']) != 0 ) 
		{	$toChange = $toChange."\n idPerson = ".$_POST['PC_Uzytkownik'].","; 
		}

		if( strcmp($row['Czy_zaszyfrowany'], $_POST['PC_CzyZaszyfrowany']) != 0 ) 
		{	$toChange = $toChange."\n Encrypted = ".$_POST['PC_CzyZaszyfrowany'].","; }

		if( strcmp($row['ID_System'], $_POST['PC_System']) != 0 ) 
		{	$toChange = $toChange."\n OperatingSystem = ".$_POST['PC_System'].","; }

		if( strcmp($row['ID_Status'], $_POST['PC_Status']) != 0 ) 
		{	$toChange = $toChange."\n idStatusComputer = ".$_POST['PC_Status'].","; 		}

		if( strcmp($row['Identyfikatro_BitLocker'], $_POST['PC_IdentyfikatorBitLocker']) != 0 )
		{	$toChange = $toChange."\n IdentifierBitLocker = '".$_POST['PC_IdentyfikatorBitLocker']."',"; }

		if(strcmp($row['Klucz_BitLocker'], $_POST['PC_KluczBitLocker']) != 0 ) 
		{	$toChange = $toChange."\n RecoveryKeyBitLocker = '".$_POST['PC_KluczBitLocker']."',"; }

		if(strcmp($row['Haslo'], $_POST['PC_HasloBitLocker']) != 0 ) 
		{	$toChange = $toChange."\n PasswordEncrypted = '".$_POST['PC_HasloBitLocker']."',"; }

		if(strcmp($row['Data_szyfrowania'], $_POST['PC_DataSzyfrowania']) != 0 ) 
		{	$toChange = $toChange."\n DateEncrypted = '".$_POST['PC_DataSzyfrowania']."',"; }

		if(strcmp($row['Gwarancja'], $_POST['PC_Gwarancja']) != 0 ) 
		{	$toChange = $toChange."\n Warranty = ".$_POST['PC_Gwarancja'].","; }

		if(strcmp($row['Procesor'], $_POST['PC_Procesor']) != 0 ) 
		{ 	$toChange = $toChange."\n CPU = '".$_POST['PC_Procesor']."',"; }

		if(strcmp($row['Liczba_watkow'], $_POST['PC_Liczba_watkow']) != 0 ) 
		{	$toChange = $toChange."\n NumberOfCores = '".$_POST['PC_Liczba_watkow']."',"; }

		if(strcmp($row['Ilosc_RAMu'], $_POST['PC_RAM']) != 0 ) 
		{	$toChange = $toChange."\n RAMMemory = '".$_POST['PC_RAM']."',"; }

		if(strcmp($row['Rodzaj_dysku_1'], $_POST['PC_Rodzaj_dysku_1']) != 0 ) 
		{	$toChange = $toChange."\n HardDriveType_1 = '".$_POST['PC_Rodzaj_dysku_1']."',";	}

		if(strcmp($row['Rozmiar_dysku_1'], $_POST['PC_Rozmiar_dysku_1']) != 0 ) 
		{	$toChange = $toChange."\n HardDriveCapacity_1 = '".$_POST['PC_Rozmiar_dysku_1']."',"; }

		if(strcmp($row['Rodzaj_dysku_2'], $_POST['PC_Rodzaj_dysku_2']) != 0 ) 
		{	$toChange = $toChange."\n HardDriveType_2 = '".$_POST['PC_Rodzaj_dysku_2']."',"; }

		if(strcmp($row['Rozmiar_dysku_2'], $_POST['PC_Rozmiar_dysku_2']) != 0 ) 
		{	$toChange = $toChange."\n HardDriveCapacity_2 = '".$_POST['PC_Rozmiar_dysku_2']."',"; }

		if(strcmp($row['Grafika'], $_POST['PC_Grafika']) != 0 ) 
		{	$toChange = $toChange."\n Grapfic = '".$_POST['PC_Grafika']."',"; }

		if(strcmp($row['Rozdzielczosc'], $_POST['PC_Rozdzielczosc']) != 0 ) 
		{	$toChange = $toChange."\n DisplayResolution = '".$_POST['PC_Rozdzielczosc']."',"; }
		

		unset($_POST['PC_Nazwa']);
		unset($_POST['PC_Producent']);
		unset($_POST['PC_Model']);
		unset($_POST['PC_SN']);
		unset($_POST['PC_Uzytkownik']);
		unset($_POST['PC_CzyZaszyfrowany']);
		unset($_POST['PC_System']);
		unset($_POST['PC_Status']);
		unset($_POST['PC_IdentyfikatorBitLocker']);
		unset($_POST['PC_KluczBitLocker']);
		unset($_POST['PC_HasloBitLocker']);
		unset($_POST['PC_DataSzyfrowania']);
		unset($_POST['PC_MacEthernet']);
		unset($_POST['PC_MacEthernet2']);
		unset($_POST['PC_Gwarancja']);
		unset($_POST['PC_Procesor']);
		unset($_POST['PC_Liczba_watkow']);
		unset($_POST['PC_Ilosc_RAMu']);
		unset($_POST['PC_Rodzaj_dysku_1']);
		unset($_POST['PC_Rozmiar_dysku_1']);
		unset($_POST['PC_Rodzaj_dysku_2']);
		unset($_POST['PC_Rozmiar_dysku_2']);
		unset($_POST['PC_Grafika']);
		unset($_POST['PC_Rozdzielczosc']);
		unset($_POST['PC_number']);
		

		$toChange = substr($toChange, 0, -1);
		
		$sql_update = "UPDATE computers SET ".$toChange." WHERE computers.idComputers = ".$no.";";
		
		mysql_query($sql_update) or die("Zapytanie niepoprawne");

		echo $sql_update;
		
		mysql_close();


		header("Location: ../../homes.php?number=".$no."");

	}else{
		
		mysql_close();
		header("Location: ../../index.php");
	}
?>