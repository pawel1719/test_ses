<?php
	require_once "PHP/function.php";
	include_once "PHP/config.php";
	
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>

	<?php 
		include_once PATH_TO_HTML_HEAD; 
	?>
	<title>System Ewidencji - Home</title>

</head>
<body onLoad="nextTabPC();">
	
	<div id="CONTAINER">
	
		<div id="BAR">
			<?php 
				include_once PATH_TO_HTML_BAR; 
			?>
		</div>
		
		<div id="CONTENT">
			<div id="TAB_BAR">
				<center>
					<button onClick="nextTabPC();">Komputer</button>
					<button onClick="nextTabPERSON();">Dane osobowe</button>
					<button onClick="nextTabOFFICE();">Office</button>
					<button onClick="nextTabINVOICE();">Faktura</button>
				</center>
			</div>
			
			<?php
			
				define('NUMBER_OF_RESULT_PER_PAGE', 30);
				connectDB();
				
				$sql = "SELECT 	 pc.idComputers 'ID_PC'
						        ,typ.Type 'Urzadzenie'
						        ,prod.Producer  'Producent'
						        ,model.Producer 'Model'
						        ,pc.ComputerName 'Nazwa'
						        ,pc.SerialNumber 'SN'
						        ,os.Name  'System'
						        ,pc.idPerson 'Id_Osoby'
						        ,per.Surname 'Nazwisko'
						        ,per.Name 'Imie'
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
				WHERE pc.idComputers = ".$_GET['number'];				
				
				
				$query = mysql_query($sql);
				
				$row = mysql_fetch_assoc($query);
				
				
					echo '
				<div id="PC" onClick="nextTabPC();" class="empty">
					<table>
						<tr>
							<td>Nazwa PC</td>
							<td>'.$row['Nazwa'].'</td>
						</tr>
						<tr>
							<td>Producent</td>
							<td>'.$row['Producent'].'</td>
						</tr>
						<tr>
							<td>Model</td>
							<td>'.$row['Model'].'</td>
						</tr>
						<tr>
							<td>Numer seryjny</td>
							<td>'.$row['SN'].'</td>
						</tr>
						<tr>
							<td>Użytkownik</td>
							<td>'.$row['Nazwisko'].' '.$row['Imie'].'</td>
						</tr>
						<tr>	
							<td>Szyfrowany</td>
							<td>'.yesORno($row['Czy_zaszyfrowany']).'</td>
						</tr>
						<tr>
							<td>System</td>
							<td>'.$row['System'].'</td>
						</tr>
						<tr>	
							<td>Status</td>
							<td>'.$row['Status'].'</td>
						</tr>
						<tr>	
							<td>Identyfikatro BitLocker</td>
							<td>'.$row['Identyfikatro_BitLocker'].'</td>
						</tr>
						<tr>	
							<td>Klucz BitLocker</td>
							<td>'.$row['Klucz_BitLocker'].'</td>
						</tr>
						<tr>	
							<td>Hasło</td>
							<td>'.$row['Haslo'].'</td>
						</tr>
						<tr>	
							<td>Data szyfrowania</td>
							<td>'.$row['Data_szyfrowania'].'</td>
						</tr>
						<tr>	
							<td>MAC Ethernet</td>
							<td>'.$row['Mac_ETH'].'</td>
						</tr>
						<tr>	
							<td>MAC Wi-Fi</td>
							<td>'.$row['Mac_ETH2'].'</td>
						</tr>
						<tr>	
							<td>Gwarancja</td>
							<td>'.showTheValue($row['Gwarancja'], "miesięcy").'</td>
						</tr>
						<tr>	
							<td>Procesor</td>
							<td>'.$row['Procesor'].'</td>
						</tr>
						<tr>	
							<td>Liczba wątków</td>
							<td>'.$row['Liczba_watkow'].'</td>
						</tr>
						<tr>	
							<td>Ilość pamięci RAM</td>
							<td>'.$row['Ilosc_RAMu'].'</td>
						</tr>
						<tr>	
							<td>Rodzaj dysku 1</td>
							<td>'.$row['Rodzaj_dysku_1'].'</td>
						</tr>
						<tr>	
							<td>Rozmiar dysku 1</td>
							<td>'.showTheValue($row['Rozmiar_dysku_1'], "GB").'</td>
						</tr>
						<tr>	
							<td>Rodzaj dysku 2</td>
							<td>'.$row['Rodzaj_dysku_2'].'</td>
						</tr>
						<tr>	
							<td>Rozmiar dysku 2</td>
							<td>'.showTheValue($row['Rozmiar_dysku_2'], "GB").'</td>
						</tr>
						<tr>	
							<td>Grafika</td>
							<td>'.$row['Grafika'].'</td>
						</tr>
						<tr>	
							<td>Rozdzielczość</td>
							<td>'.$row['Rozdzielczosc'].'</td>
						</tr>
						</table>
					</div>

					<div id="PC_EDIT" class="empty">
					<form action="PHP/EVENT/add_information_pc.php" method="POST">
					<table>
						<tr>
							<td>Nazwa PC</td>
							<td><input type="text" value="'.$row['Nazwa'].'" name="PC_Nazwa" /></td>
						</tr>
						<tr>
							<td>Producent</td>
							<td>'.dropDownListForTableProducerToHTML("PC_Producent" ,$row['Producent']).'</td>
						</tr>
						<tr>
							<td>Model</td>
							<td>'.dropDownListForTableModelToHTML( "PC_Model",$row['Model']).'</td>
						</tr>
						<tr>
							<td>Numer seryjny</td>
							<td>'.$row['SN'].'</td>
						</tr>
						<tr>
							<td>Użytkownik</td>
							<td>'.dropDownListForTablePersonToHTML("PC_Uzytkownik",$row['Nazwisko'].' '.$row['Imie']).'</td>
						</tr>
						<tr>
							<td>Czy zaszyfrowany</td>
							<td>'.dropDownListForTrueOrFalseToHTML("PC_CzyZaszyfrowany",$row['Czy_zaszyfrowany']).'</td>
						</tr>
						<tr>
							<td>System</td>
							<td>'.dropDownListForTableOperatingSystemToHTML("PC_System", $row['System']).'</td>
						</tr>
						<tr>	
							<td>Status</td>
							<td>'.dropDownListForTableStatusToHTML("PC_Status", $row['Status']).'</td>
						</tr>
						<tr>	
							<td>Identyfikatro BitLocker</td>
							<td><input type="text" value="'.$row['Identyfikatro_BitLocker'].'" name="PC_IdentyfikatorBitLocker" size="36" /></td>
						</tr>
						<tr>	
							<td>Klucz BitLocker</td>
							<td><input type="text" value="'.$row['Klucz_BitLocker'].'" name="PC_KluczBitLocker" size="60" /></td>
						</tr>
						<tr>	
							<td>Hasło</td>
							<td><input type="text" value="'.$row['Haslo'].'" name="PC_HasloBitLocker" /></td>
						</tr>
						<tr>	
							<td>Data szyfrowania</td>
							<td><input type="date" value="'.$row['Data_szyfrowania'].'" name="PC_DataSzyfrowania" /></td>
						</tr>
						<tr>	
							<td>MAC Ethernet</td>
							<td>'.$row['Mac_ETH'].'</td>
						</tr>
						<tr>	
							<td>MAC Wi-Fi</td>
							<td>'.$row['Mac_ETH2'].'</td>
						</tr>
						<tr>	
							<td>Gwarancja</td>
							<td>'.getTheValue("number", "PC_Gwarancja", "miesięcy", $row['Gwarancja']).'</td>
						</tr>
						<tr>	
							<td>Procesor</td>
							<td><input type="text" value="'.$row['Procesor'].'" name="PC_Procesor" /></td>
						</tr>
						<tr>	
							<td>Liczba wątków</td>
							<td><input type="number" value="'.$row['Liczba_watkow'].'" name="PC_Liczba_watkow" /></td>
						</tr>
						<tr>	
							<td>Ilość pamięci RAM</td>
							<td>'.dropDownListRAMToHTML("PC_RAM", $row['Ilosc_RAMu']).'</td>
						</tr>
						<tr>	
							<td>Rodzaj dysku 1</td>
							<td>'.dropDownListTypeHardDiskToHTML("PC_Rodzaj_dysku_1", $row['Rodzaj_dysku_1']).'</td>
						</tr>
						<tr>	
							<td>Rozmiar dysku 1</td>
							<td>'.getTheValue("number", "PC_Rozmiar_dysku_1", "GB", $row['Rozmiar_dysku_1']).'</td>
						</tr>
						<tr>	
							<td>Rodzaj dysku 2</td>
							<td>'.dropDownListTypeHardDiskToHTML("PC_Rodzaj_dysku_2", $row['Rodzaj_dysku_2']).'</td>
						</tr>
						<tr>	
							<td>Rozmiar dysku 2</td>
							<td>'.getTheValue("number", "PC_Rozmiar_dysku_2", "GB", $row['Rozmiar_dysku_2']).'</td>
						</tr>
						<tr>	
							<td>Grafika</td>
							<td><input type="text" value="'.$row['Grafika'].'" name="PC_Grafika" /></td>
						</tr>
						<tr>	
							<td>Rozdzielczość</td>
							<td>'.dropDownListDisplayToHTML("PC_Rozdzielczosc", $row['Rozdzielczosc']).'</td>
						</tr>
						<tr>
							<td>
								<input type="hidden" name="PC_number" value="'.$_GET['number'].'" />
								<input type="hidden" name="User" value="86" />
							</td>
							<td><center><input type="submit" value="Zapisz" /></center> </td>
						</tr>
					</table>
					</form>					
					

					</div>
					
					
					<div id="Person" onClick="nextTabPERSON();" class="empty">
					<!-- Tabele with personal data -->
					
						<table>
						<tr>
							<td>Nazwisko</td>
							<td>'.$row['Nazwisko'].'</td>
						</tr>
						<tr>
							<td>Imię</td>
							<td>'.$row['Imie'].'</td>
						</tr>
						</table>
					</div>
					
					<!-- Table with office data --> 
					<div id="Office" onClick="nextTabOFFICE();" class="empty">
						<table>
						<tr>	
							<td>Klucz offica</td>
							<td>'.$row['Klucz_offica'].'</td>
						</tr>
						<tr>	
							<td>Data dodania</td>
							<td>'.$row['Data_dodania'].'</td>
						</tr>
						<tr>	
							<td>Office</td>
							<td>'.$row['Office'].'</td>
						</tr>
						<tr>	
							<td>Wersja</td>
							<td>'.$row['Wersja'].'</td>
						</tr>
						</table>
					</div>
						
					<!-- Table with invoice data -->
					<div id="Invoice" onClick="nextTabINVOICE();" class="empty">	
						<table>
						<tr>	
							<td>Nr faktury</td>
							<td>'.$row['Nr_faktury'].'</td>
						</tr>
						<tr>	
							<td>Data faktury</td>
							<td>'.$row['Data_faktury'].'</td>
						</tr>
						<tr>	
							<td>Cena</td>
							<td>'.$row['Cena'].'</td>
						</tr>
						</table>
					</div>
						';
							
				mysql_free_result($query);
				
			?>
			<div id="CONTENT_TAB"></div>

				<center> 
					<button onClick="nextTabPC_Edit();">Edytuj</button> <button>Zapisz</button>
				</center>
				<hr/>
				
			<?php
				
				$sql = "SELECT 	c.idComments 'ID_kom'
								,c.idPerson 'ID_osoba'
								,CONCAT(p.Name, ' ',p.Surname) 'Imie_Nazwisko'
								,pc.idComputers 'id_pc'
								,CONCAT(pc.ComputerName, ' ', pc.SerialNumber) 'PC_SN'
								,d.idDevice 'ID_urzadzenia'
								,CONCAT(typ.Type, ' ',prod.Producer, ' ',model.Producer) 'Nazwa_urzadzenia'
								,c.Comment 'Komentarz'
								,c.DateAdd 'Data_dodania_kom'
						FROM comments c LEFT JOIN person p ON c.idPerson=p.idPerson
						LEFT JOIN computers pc ON c.idComputers=pc.idComputers
						LEFT JOIN device d ON c.idDevice=d.idDevice
		                LEFT JOIN typeofdevice typ ON d.idTypeOfDevice=typ.idTypeOfDevice
		                LEFT JOIN producerdevice prod ON d.idProducerDevice=prod.idProducerDevice
		                LEFT JOIN modelsdevice model ON d.idModelsDevice=model.idModelsDevice
						WHERE c.idComputers = ".$_GET['number']."
						ORDER BY c.DateAdd ASC;";
				
				$query = mysql_query($sql);
				
				echo '<table>
						<tr>
							<td>Dodał komentarz</td>
							<td>Komentarz</td>
							<td>Data</td>
						</tr>';
						
				while( $row = mysql_fetch_assoc($query))
				{
					echo ' 
							<tr>
								<td>'.$row['Imie_Nazwisko'].'</td>
								<td>'.$row['Komentarz'].'</td>
								<td>'.$row['Data_dodania_kom'].'</td>
							</tr>';
				}
				
				mysql_free_result($query);
			?>

				<tr>
				<form action="PHP/EVENT/add.php" target="_self" method="POST">
					<td> Użytkownik zalogowany</td>
					<td> <textarea type="text" name="comments" minlength="4" maxlength="255" cols="70" rows="5"></textarea></td>
					<td> 
						<input type="submit" value="Dodaj"> 
						<input type="hidden" name="user" value="86" />
						<input type="hidden" name="number" value="<?php echo $_GET['number']; ?>" />
					</td>
				</form>
				</tr>
				</table>
			<?php 
			
				if(isset($_POST['comments'])){
					mysql_query(addComments(86,$_GET['number'], $_POST['comments'])); 
					
					unset($_POST['comments']);
				}
								
				mysql_close();
			?>
			
		</div>
		
		<div id="FOOTER">
			<?php 
				include_once PATH_TO_HTML_FOOTER; 
			?>
		</div>
	</div>
	
</body>
</html>