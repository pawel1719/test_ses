<?php
	session_start();

	require_once "../function.php";
	
c	onnectDB();
		

	if( isset($_POST['ADD_PC_Nazwa']) && isset($_POST['ADD_PC_SerialNumber']) && isset($_POST['ADD_PC_Model']) ){

		$error_validation = 0;
		$_SESSION['error_validation_adding_pc'] = "";


		if( !is_numeric($_POST['ADD_PC_Producent']) ) { 	
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWANY PRODUCENT\n";
		}

		if( !is_numeric($_POST['ADD_PC_Model']) ) { 	
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNY MODEL\n";
		}
		
		if( !is_numeric($_POST['ADD_PC_Uzytkownik']) ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNY UŻYTKOWNIKA\n";
		}
		
		if( !is_numeric($_POST['ADD_PC_CzyZaszyfrowany']) ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNE DANE CZY ZASZYFROWANY\n";
		}

		if( !is_numeric($_POST['ADD_PC_System']) ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNY SYSTEM\n";
		}

		if( !is_numeric($_POST['ADD_PC_Status']) ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNY STATUS\n";
		}
		
		if( !is_numeric($_POST['ADD_PC_Gwarancja']) ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNA GWARANCJA\n";
		}
		
		if( !is_numeric($_POST['ADD_PC_Liczba_watkow']) ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "BŁĄD LICZBY RDZENI\n";
		}

		if( !is_numeric($_POST['ADD_PC_Rozmiar_dysku_1']) ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNY ROZMIAR DYSKU 1\n";
		}

		if( !is_numeric($_POST['ADD_PC_Rozmiar_dysku_2']) ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNY ROZMIAR DYSKU 2\n";
		}


		if( preg_match( "([A-Z0-9\-]{4,14})", $_POST['ADD_PC_Nazwa']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNA NAZWA dozwolone tylko duże litery i cyfry!\n";
		}

		if( preg_match( "([A-Z0-9]{3,})", $_POST['ADD_PC_SerialNumber']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWNY NUMER SERYJNY dozwolone tylko duże litery i cyfry!\n";
		}

		if( preg_match( "(^[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}$)", $_POST['ADD_PC_IdentyfikatorBitLocker']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWIDŁOWY IDENTYFIKATOR BITLOCKERA\n";
		}

		if( preg_match( "(^\d{6}-\d{6}-\d{6}-\d{6}-\d{6}-\d{6}-\d{6}-\d{6}$)", $_POST['ADD_PC_KluczBitLocker']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPOPRAWNY KLUCZ BITLOCKERA\n";
		}

		if( preg_match( "(^[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}$)",POST['ADD_PC_Ethernet']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWANY ADRES MAC ETH1 dozwolone tylko duże litery i cyfry!\n";
		}

		if( preg_match( "(^[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}$)",POST['ADD_PC_MAC_WiFi']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPORPAWANY ADRES MAC WiFi dozwolone tylko duże litery i cyfry!\n";
		}

		if( preg_match( "(^SSD|HDD$)", $_POST['ADD_PC_Rodzaj_dysku_1']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPOPRAWNY RODZAJ DYSKU 1\n";
		}

		if( preg_match( "(^SSD|HDD$)", $_POST['ADD_PC_Rodzaj_dysku_2']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPOPRAWNY RODZAJ DYSKU 2\n";
		}

		if( preg_match( "(^[0-9]{2,4}×[0-9]{2,4}$)", $_POST['ADD_PC_Rozdzielczosc']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPOPRAWNA ROZDZIELCZOŚĆ\n";
		}

		if( preg_match( "(^[0-9]{4}-[0-9]{2}-[0-9]{2}$)", $_POST['ADD_PC_DataSzyfrowania']) == 0 ) {
			$error_validation = 1;
			$_SESSION['error_validation_adding_pc'] = "NIEPOPRAWNA DATA SZYFROWANIA\n";
		}





		// $_POST['ADD_PC_Nazwa'];
		// $_POST['ADD_PC_Producent'];
		// $_POST['ADD_PC_Model'];
		// $_POST['ADD_PC_SerialNumber'];
		// $_POST['ADD_PC_Uzytkownik'];
		// $_POST['ADD_PC_CzyZaszyfrowany'];
		// $_POST['ADD_PC_System'];
		// $_POST['ADD_PC_Status'];
		// $_POST['ADD_PC_IdentyfikatorBitLocker'];
		// $_POST['ADD_PC_KluczBitLocker'];
		$_POST['ADD_PC_HasloBitLocker'];
		// echo $_POST['ADD_PC_DataSzyfrowania'];
		// $_POST['ADD_PC_Ethernet'];
		// $_POST['ADD_PC_MAC_WiFi'];
		// $_POST['ADD_PC_Gwarancja'];
		$_POST['ADD_PC_Procesor'];
		// $_POST['ADD_PC_Liczba_watkow'];
		// $_POST['ADD_PC_RAM'];
		// $_POST['ADD_PC_Rodzaj_dysku_1'];
		// $_POST['ADD_PC_Rozmiar_dysku_1'];
		// $_POST['ADD_PC_Rodzaj_dysku_2'];
		// $_POST['ADD_PC_Rozmiar_dysku_2'];
		$_POST['ADD_PC_Grafika'];
		// $_POST['ADD_PC_Rozdzielczosc'];


	}
	 else if( isset($_POST['PC_Nazwa']) && isset($_POST['PC_CzyZaszyfrowany']) && isset($_POST['PC_number']))
	{
		$no = $_POST['PC_number'];
		$logged_user = $_POST['User'];
		$toChange = "";
		$history1 = "";
		$history2 = "";
		$log = " ( ".$logged_user.", ";
		$execute = 1;


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


		//downloading data from the table for comparison of changes
		$query = mysql_query($sql);
		$row = mysql_fetch_assoc($query);


		///////////////////////////////////////////////////////////////////////////////////////////////	
		if( strcmp($row['Nazwa'], $_POST['PC_Nazwa']) != 0 ) 
		{ 	
			$toChange = $toChange."\n ComputerName = '".$_POST['PC_Nazwa']."',";
			$log = $log." '".$_POST['PC_Nazwa']."', 1,";
			
			$history1 = $history1."\n '".$row['Nazwa']."',";
			$history1 = $history1."\n '".$row['SN']."',";

			$history2 = $history2."\n '".$_POST['PC_Nazwa']."',";
			$history2 = $history2."\n '".$row['SN']."',";

			$execute = 0;
		}else {

			if( strlen($row['Nazwa']) >= 3 ) {
				$log = $log." '".$row['Nazwa']."', 0,";
			} else {
				$log = $log." NULL, 0,";
			}

			$history1 = $history1."\n '".$row['Nazwa']."',";
			$history1 = $history1."\n '".$row['SN']."',";
			
			$history2 = $history2."\n '".$row['Nazwa']."',";
			$history2 = $history2."\n '".$row['SN']."',";	
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strcmp($row['ID_Producent'], $_POST['PC_Producent']) !=0 ) 
		{	
			$toChange = $toChange."\n idProducerDevice = ".$_POST['PC_Producent'].","; 
			$log = $log."\n ".$_POST['PC_Producent'].", 1,";

			$execute = 0;
		}else {
			if( strlen($row['ID_Producent']) >= 1 ) {
				$log = $log."\n ".$row['ID_Producent'].", 0,";
			} else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strcmp($row['ID_Model'], $_POST['PC_Model']) != 0 ) 
		{	
			$toChange = $toChange."\n idModelsDevice = ".$_POST['PC_Model'].","; 
			$log = $log."\n ".$_POST['PC_Model'].", 1,"; 

			$execute = 0;
		}else {
			if( strlen($row['ID_Model']) >= 1 ) {
				$log = $log."\n ".$row['ID_Model'].", 0,";
			} else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strcmp($row['ID_Osoby'], $_POST['PC_Uzytkownik']) != 0 ) 
		{	
			$toChange = $toChange."\n idPerson = ".$_POST['PC_Uzytkownik'].",";
			$log = $log."\n ".$_POST['PC_Uzytkownik'].", 1,";
			
			$history1 = $history1."\n ".$row['ID_Osoby'].",";
			$history2 = $history2."\n ".$_POST['PC_Uzytkownik'].",";

			$execute = 0;

		} else {
			
			if( strlen($row['ID_Osoby']) >= 1 ) {
				$log = $log."\n ".$row['ID_Osoby'].", 0,";
			} else {
				$log = $log."\n NULL, 0,";
			}
			
			$history1 = $history1."\n NULL,";
			$history2 = $history2."\n ".$_POST['PC_Uzytkownik'].",";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strcmp($row['Nazwa'], $_POST['PC_Nazwa']) != 0 || strcmp($row['ID_Osoby'], $_POST['PC_Uzytkownik']) != 0 || strcmp($row['ID_Status'], $_POST['PC_Status']) != 0)
		{ 	
			$history1 = $history1."\n ".$logged_user.",";
			$history1 = $history1."\n '".date('Y-m-d H:i:s')."',";

			$history2 = $history2."\n 86,";
			$history2 = $history2."\n '".date('Y-m-d H:i:s')."',";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strcmp($row['Czy_zaszyfrowany'], $_POST['PC_CzyZaszyfrowany']) != 0 ) 
		{	
			$toChange = $toChange."\n Encrypted = ".$_POST['PC_CzyZaszyfrowany'].","; 
			$log = $log."\n ".$_POST['PC_CzyZaszyfrowany'].", 1,"; 

			$execute = 0;
		}else {
			if( strlen($row['Czy_zaszyfrowany']) >= 1 ) {
				$log = $log."\n ".$row['Czy_zaszyfrowany'].", 0,";
			} else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strcmp($row['ID_System'], $_POST['PC_System']) != 0 ) 
		{	
			$toChange = $toChange."\n OperatingSystem = ".$_POST['PC_System'].","; 
			$log = $log."\n ".$_POST['PC_System'].", 1,"; 

			$execute = 0;
		}else {
			if( strlen($row['ID_System']) >= 1 ) {
				$log = $log."\n ".$row['ID_System'].", 0,"; 
			} else {
				$log = $log."\n NULL, 0,"; 
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strcmp($row['ID_Status'], $_POST['PC_Status']) != 0 ) 
		{	
			$toChange = $toChange."\n idStatusComputer = ".$_POST['PC_Status'].","; 
			$log = $log."\n ".$_POST['PC_Status'].", 1,";

			$execute = 0;
		}else {
			if( strlen($row['ID_Status']) >= 1 ) {
				$log = $log."\n ".$row['ID_Status'].", 0,";
			} else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( $row['ID_Status'] == 2 && $_POST['PC_Status'] == 1){
			//wydanie komputera
			$history1 = $history1."\n 0, 1,";
			$history2 = $history2."\n 1, 0,";
		}else if(  $row['ID_Status'] == 1 && $_POST['PC_Status'] == 2) {
			//zwrócnie kompa
			$history1 = $history1."\n 1, 0,";
			$history2 = $history2."\n 0, 1,";
		}else{
			//bezczynnosc, zmiana innnych danych 
			$history1 = $history1."\n 0, 0,";
			$history2 = $history2."\n 0, 0,";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strcmp($row['Identyfikatro_BitLocker'], $_POST['PC_IdentyfikatorBitLocker']) != 0 )
		{	
			$toChange = $toChange."\n IdentifierBitLocker = '".$_POST['PC_IdentyfikatorBitLocker']."',";
			$log = $log."\n '".$_POST['PC_IdentyfikatorBitLocker']."', 1,";

			$execute = 0;

		} else {

			if(strlen($row['Identyfikatro_BitLocker']) >= 3 ) {
				$log = $log."\n '".$row['Identyfikatro_BitLocker']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Klucz_BitLocker'], $_POST['PC_KluczBitLocker']) != 0 ) 
		{	
			$toChange = $toChange."\n RecoveryKeyBitLocker = '".$_POST['PC_KluczBitLocker']."',";
			$log = $log."\n '".$_POST['PC_KluczBitLocker']."', 1,";

			$execute = 0;

		} else {

			if(strlen($row['Klucz_BitLocker']) >= 3 ) {
				$log = $log."\n '".$row['Klucz_BitLocker']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Haslo'], $_POST['PC_HasloBitLocker']) != 0 ) 
		{	
			$toChange = $toChange."\n PasswordEncrypted = '".$_POST['PC_HasloBitLocker']."',";
			$log = $log."\n '".$_POST['PC_HasloBitLocker']."', 1,";

			$execute = 0;

		} else {

			if(strlen($row['Haslo']) >= 3 ) {
				$log = $log."\n '".$row['Haslo']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Data_szyfrowania'], $_POST['PC_DataSzyfrowania']) != 0 ) 
		{	
			$toChange = $toChange."\n DateEncrypted = '".$_POST['PC_DataSzyfrowania']."',";
			$log = $log."\n '".$_POST['PC_DataSzyfrowania']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Data_szyfrowania']) >= 3 ) {
				$log = $log."\n '".$row['Data_szyfrowania']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Gwarancja'], $_POST['PC_Gwarancja']) != 0 ) 
		{	
			$toChange = $toChange."\n Warranty = ".$_POST['PC_Gwarancja'].",";
			$log = $log."\n ".$_POST['PC_Gwarancja'].", 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Gwarancja']) >= 1 ) {
				$log = $log."\n ".$row['Gwarancja'].", 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Procesor'], $_POST['PC_Procesor']) != 0 ) 
		{ 	
			$toChange = $toChange."\n CPU = '".$_POST['PC_Procesor']."',";
			$log = $log."\n '".$_POST['PC_Procesor']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Procesor']) >= 3 ) {
				$log = $log."\n '".$row['Procesor']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Liczba_watkow'], $_POST['PC_Liczba_watkow']) != 0 ) 
		{	
			$toChange = $toChange."\n NumberOfCores = '".$_POST['PC_Liczba_watkow']."',";
			$log = $log."\n '".$_POST['PC_Liczba_watkow']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Liczba_watkow']) >= 1 ) {
				$log = $log."\n '".$row['Liczba_watkow']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Ilosc_RAMu'], $_POST['PC_RAM']) != 0 ) 
		{	
			$toChange = $toChange."\n RAMMemory = '".$_POST['PC_RAM']."',";
			$log = $log."\n '".$_POST['PC_RAM']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Ilosc_RAMu']) >= 1 ) {
				$log = $log."\n '".$row['Ilosc_RAMu']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Rodzaj_dysku_1'], $_POST['PC_Rodzaj_dysku_1']) != 0 ) 
		{	
			$toChange = $toChange."\n HardDriveType_1 = '".$_POST['PC_Rodzaj_dysku_1']."',";
			$log = $log."\n '".$_POST['PC_Rodzaj_dysku_1']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Rodzaj_dysku_1']) >= 3 ) {
				$log = $log."\n '".$row['Rodzaj_dysku_1']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Rozmiar_dysku_1'], $_POST['PC_Rozmiar_dysku_1']) != 0 ) 
		{	
			$toChange = $toChange."\n HardDriveCapacity_1 = '".$_POST['PC_Rozmiar_dysku_1']."',";
			$log = $log."\n '".$_POST['PC_Rozmiar_dysku_1']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Rozmiar_dysku_1']) >= 2 ) {
				$log = $log."\n '".$row['Rozmiar_dysku_1']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Rodzaj_dysku_2'], $_POST['PC_Rodzaj_dysku_2']) != 0 ) 
		{	
			$toChange = $toChange."\n HardDriveType_2 = '".$_POST['PC_Rodzaj_dysku_2']."',";
			$log = $log."\n '".$_POST['PC_Rodzaj_dysku_2']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Rodzaj_dysku_2']) >= 3 ) {
				$log = $log."\n '".$row['Rodzaj_dysku_2']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Rozmiar_dysku_2'], $_POST['PC_Rozmiar_dysku_2']) != 0 ) 
		{	
			$toChange = $toChange."\n HardDriveCapacity_2 = '".$_POST['PC_Rozmiar_dysku_2']."',";
			$log = $log."\n '".$_POST['PC_Rozmiar_dysku_2']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Rozmiar_dysku_2']) >= 2 ) {
				$log = $log."\n '".$row['Rozmiar_dysku_2']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Grafika'], $_POST['PC_Grafika']) != 0 ) 
		{	
			$toChange = $toChange."\n Grapfic = '".$_POST['PC_Grafika']."',";
			$log = $log."\n '".$_POST['PC_Grafika']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Grafika']) >= 3 ) {
				$log = $log."\n '".$row['Grafika']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if(strcmp($row['Rozdzielczosc'], $_POST['PC_Rozdzielczosc']) != 0 ) 
		{	
			$toChange = $toChange."\n DisplayResolution = '".$_POST['PC_Rozdzielczosc']."',";
			$log = $log."\n '".$_POST['PC_Rozdzielczosc']."', 1,";

			$execute = 0;
		
		} else {
			
			if(strlen($row['Rozdzielczosc']) >= 3 ) {
				$log = $log."\n '".$row['Rozdzielczosc']."', 0,";
			}else {
				$log = $log."\n NULL, 0,";
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		//adding the rest of the data to the logsComputers table
		$log = $log." '".date('Y-m-d H:i:s')."', ";

		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strlen($row['ID_Urzadzenie']) >= 1 ) {
			$log = $log." ".$row['ID_Urzadzenie'].", 0,";
		} else {
			$log = $log." NULL, 0,";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strlen($row['SN']) >= 1 ) {
			$log = $log." '".$row['SN']."', 0,";
		} else {
			$log = $log." NULL, 0,";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strlen($row['Mac_ETH']) >= 1 ) {
			$log = $log." '".$row['Mac_ETH']."', 0,";
		} else {
			$log = $log." NULL, 0,";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strlen($row['Mac_ETH2']) >= 1 ) {
			$log = $log." '".$row['Mac_ETH2']."', 0,";
		} else {
			$log = $log." NULL, 0,";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strlen($row['ID_Office']) >= 1 ) {
			$log = $log." ".$row['ID_Office'].", 0,";
		} else {
			$log = $log." NULL, 0,";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////
		if( strlen($row['ID_faktury']) >= 1 ) {
			$log = $log." ".$row['ID_faktury'].", 0 )";
		} else {
			$log = $log." NULL, 0 );";
		}
		///////////////////////////////////////////////////////////////////////////////////////////////

		//creating a history of computers
		if( strcmp($row['Nazwa'], $_POST['PC_Nazwa']) != 0 || strcmp($row['ID_Osoby'], $_POST['PC_Uzytkownik']) != 0 || strcmp($row['ID_Status'], $_POST['PC_Status']) != 0)
		{
			$history1 = substr($history1, 0, -1);
			$insert1 = "INSERT INTO computerhistory ( ComputerName, SerialNumber, idPersonUser, idPersonIT, Date, GiveAComputer, GetAComputer) VALUES ( ".$history1.");";
			mysql_query($insert1)  or die("Error query 1");

			$history2 = substr($history2, 0, -1);
			$insert2 = "INSERT INTO computerhistory ( ComputerName, SerialNumber, idPersonUser, idPersonIT, Date, GiveAComputer, GetAComputer) VALUES ( ".$history2.");";
			mysql_query($insert2) or die("Error query 2");
		}


		//clearing the variables post 
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
		
	
		if( $execute === 0 )
		{
			//changing data in the computers table
			$toChange = substr($toChange, 0, -1);
			$sql_update = "UPDATE computers SET ".$toChange." WHERE computers.idComputers = ".$no.";";
			mysql_query($sql_update) or die("Error query 3");

			//creating a detailed history of change
			$sql_log = "INSERT INTO logsComputers( `idPersonIT`, `ComputerName`, `ChangedComputerName`, `idProducerDevice`, `ChangedIdProducerDevice`, `idModelsDevice`, `ChangedIdModelsDevice`, `idPerson`, `ChangedIdPerson`, `Encrypted`, `ChangedEncrypted`, `OperatingSystem`, `ChangedOperatingSystem`, `idStatusComputer`, `ChangedIdStatusComputer`, `IdentifierBitLocker`, `ChangedIdentifierBitLocker`, `RecoveryKeyNitLocker`	, `ChangedRecoveryKeyNitLocker`, `PasswordEncrypted`, `ChangedPasswordEncrypted`, `DateEncrypted`		, `ChangedDateEncrypted`, `Warranty`, `ChangedWarranty`, `CPU`, `ChangedCPU`, `NumberOfCores`, `ChangedNumberOfCores`, `RAMMemory`, `ChangedRAMMemory`, `HardDriveType_1`, `ChangedHardDriveType_1`, `HardDriveCapacity_1`, `ChangedHardDriveCapacity_1`, `HardDriveType_2`, `ChangedHardDriveType_2`, `HardDriveCapacity_2`, `ChangedHardDriveCapacity_2`, `Grapfic`, `ChangedGrapfic`, `DisplayResolution`	, `ChangedDisplayResolution`, `Date`, `idTypeOfDevice`, `ChangedIdTypeOfDevice`, `SerialNumber`, `ChangedSerialNumber`, `MacEthernet`, `ChangedMacEthernet`, `MacWiFi`, `ChangedMacWiFi`, `idOffice`, `ChangedIdOffice`, `idInvoice`, `ChangedIdInvoice` ) VALUES ".$log;
			mysql_query( $sql_log ) or die("Error query 4");
		}
				
		mysql_close();

		header("Location: ../../detailsOfComputer.php?number=".$no."");

	}else{
		
		mysql_close();
		header("Location: ../../index.php");
	}
?>