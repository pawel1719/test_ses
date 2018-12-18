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
<body onLoad="nextTabPC_Edit();">
	
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
				
				echo '
				<div id="PC_EDIT" class="empty">
					<form action="PHP/EVENT/add_information_pc.php" method="POST">
					<table>
						<tr>
							<td>Nazwa PC</td>
							<td><input type="text" name="ADD_PC_Nazwa" pattern="[A-Z0-9\-]{4,14}" title="Podaj co najmiej 4 duże litery lub cyfry "/></td>
						</tr>
						<tr>
							<td>Producent</td>
							<td>'.dropDownListForTableProducerToHTML("ADD_PC_Producent" ,"").'</td>
						</tr>
						<tr>
							<td>Model</td>
							<td>'.dropDownListForTableModelToHTML( "ADD_PC_Model","").'</td>
						</tr>
						<tr>
							<td>Numer seryjny</td>
							<td><input type="text" name="ADD_PC_SerialNumber" pattern="[A-Z0-9]{3,}" title="Tylko duże litery"/></td>
						</tr>
						<tr>
							<td>Użytkownik</td>
							<td>'.dropDownListForTablePersonToHTML("ADD_PC_Uzytkownik", "").'</td>
						</tr>
						<tr>
							<td>Czy zaszyfrowany</td>
							<td>'.dropDownListForTrueOrFalseToHTML("ADD_PC_CzyZaszyfrowany","" ).'</td>
						</tr>
						<tr>
							<td>System</td>
							<td>'.dropDownListForTableOperatingSystemToHTML("ADD_PC_System", "").'</td>
						</tr>
						<tr>	
							<td>Status</td>
							<td>'.dropDownListForTableStatusToHTML("ADD_PC_Status", "").'</td>
						</tr>
						<tr>	
							<td>Identyfikatro BitLocker</td>
							<td><input type="text" name="ADD_PC_IdentyfikatorBitLocker" pattern="^[A-Z0-9]{8}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{4}-[A-Z0-9]{12}$" title="For example: 11AA223A-DC12-AA6F-9BB2-EW4211CC8809" size="36" /></td>
						</tr>
						<tr>	
							<td>Klucz BitLocker</td>
							<td><input type="text" name="ADD_PC_KluczBitLocker" pattern="^\d{6}-\d{6}-\d{6}-\d{6}-\d{6}-\d{6}-\d{6}-\d{6}$" title="For example: 123456-098765-123456-098765-123456-098765-123456-098765" size="60" /></td>
						</tr>
						<tr>	
							<td>Hasło</td>
							<td><input type="text" name="ADD_PC_HasloBitLocker" /></td>
						</tr>
						<tr>	
							<td>Data szyfrowania</td>
							<td><input type="date" name="ADD_PC_DataSzyfrowania" /></td>
						</tr>
						<tr>	
							<td>MAC Ethernet</td>
							<td><input type="text" name="ADD_PC_Ethernet" pattern="^[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}$" title="For example: 7A-D7-22-DD-12-0D" /></td>
						</tr>
						<tr>	
							<td>MAC Wi-Fi</td>
							<td><input type="text" name="ADD_PC_MAC_WiFi" pattern="^[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}$" title="For example: 7A-D7-22-DD-12-0D" /></td>
						</tr>
						<tr>	
							<td>Gwarancja</td>
							<td>'.getTheValue("number", "ADD_PC_Gwarancja", "miesięcy", "").'</td>
						</tr>
						<tr>	
							<td>Procesor</td>
							<td><input type="text" name="ADD_PC_Procesor" /></td>
						</tr>
						<tr>	
							<td>Liczba wątków</td>
							<td><input type="number" name="ADD_PC_Liczba_watkow" /></td>
						</tr>
						<tr>	
							<td>Ilość pamięci RAM</td>
							<td>'.dropDownListRAMToHTML("ADD_PC_RAM", "").'</td>
						</tr>
						<tr>	
							<td>Rodzaj dysku 1</td>
							<td>'.dropDownListTypeHardDiskToHTML("ADD_PC_Rodzaj_dysku_1", "").'</td>
						</tr>
						<tr>	
							<td>Rozmiar dysku 1</td>
							<td>'.getTheValue("number", "ADD_PC_Rozmiar_dysku_1", "GB", "").'</td>
						</tr>
						<tr>	
							<td>Rodzaj dysku 2</td>
							<td>'.dropDownListTypeHardDiskToHTML("ADD_PC_Rodzaj_dysku_2", "").'</td>
						</tr>
						<tr>	
							<td>Rozmiar dysku 2</td>
							<td>'.getTheValue("number", "ADD_PC_Rozmiar_dysku_2", "GB", "").'</td>
						</tr>
						<tr>	
							<td>Grafika</td>
							<td><input type="text" name="ADD_PC_Grafika" /></td>
						</tr>
						<tr>	
							<td>Rozdzielczość</td>
							<td>'.dropDownListDisplayToHTML("ADD_PC_Rozdzielczosc", "").'</td>
						</tr>
						<tr>
							<td>
								<input type="hidden" name="ADD_PC_number" />
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
							<td></td>
						</tr>
						<tr>
							<td>Imię</td>
							<td></td>
						</tr>
						</table>
					</div>
					
					<!-- Table with office data --> 
					<div id="Office" onClick="nextTabOFFICE();" class="empty">
						<table>
						<tr>	
							<td>Klucz offica</td>
							<td></td>
						</tr>
						<tr>	
							<td>Data dodania</td>
							<td></td>
						</tr>
						<tr>	
							<td>Office</td>
							<td></td>
						</tr>
						<tr>	
							<td>Wersja</td>
							<td></td>
						</tr>
						</table>
					</div>
						
					<!-- Table with invoice data -->
					<div id="Invoice" onClick="nextTabINVOICE();" class="empty">	
						<table>
						<tr>	
							<td>Nr faktury</td>
							<td></td>
						</tr>
						<tr>	
							<td>Data faktury</td>
							<td></td>
						</tr>
						<tr>	
							<td>Cena</td>
							<td></td>
						</tr>
						</table>
					</div>
						';
							
				
			?>
			<div id="CONTENT_TAB"></div>
		</div>

		
		<div id="FOOTER">
			<?php 
				include_once PATH_TO_HTML_FOOTER; 
			?>
		</div>

	</div>
	
</body>
</html>