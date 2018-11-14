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
						,pc.Producer 'Producent'
						,pc.Model 'Model'
						,pc.ComputerName 'Nazwa'
						,pc.SerialNumber 'SN'
						,pc.OperatingSystem 'System'
						,pc.idPerson 'ID_User'
						,p.Surname 'Nazwisko'
						,p.Name 'Imie'
						,pc.idStatusComputer 'ID_Status'
						,s.Status 'Status'
						,pc.Encrypted 'Czy_zaszyfrowany'
						,pc.IdentifierBitLocker 'Identyfikatro_BitLocker'
						,pc.RecoveryKeyBitLocker 'Klucz_BitLocker'
						,pc.PasswordEncrypted 'Haslo'
						,pc.DateEncrypted 'Data_szyfrowania'
						,pc.MacEthernet 'Mac_ETH'
						,pc.MacWiFi 'Mac_ETH2'
						,pc.idOffice 'ID_Office'
						,o.KeyOnline 'Klucz_offica'
						,o.DateAdd 'Data_dodania'
						,o.Office 'Office'
						,o.Version 'Wersja'
						,pc.idInvoice 'ID_faktury'
						,i.NumberInvoice 'Nr_faktury'
						,i.Date 'Data_faktury'
						,i.GrosPrice 'Cena'
				FROM computers pc LEFT JOIN person p ON pc.idPerson=p.idPerson
								  LEFT JOIN statuscomputer s ON pc.idStatusComputer=s.idStatusComputer
								  LEFT JOIN office o ON pc.idOffice=o.idOffice
								  LEFT JOIN invoice i ON pc.idInvoice=i.idInvoice
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
							<td>Model</td>
							<td>'.$row['Model'].'</td>
						</tr>
						<tr>
							<td>Numer seryjny</td>
							<td>'.$row['SN'].'</td>
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
						</table>
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
					<button>Edytuj</button> <button>Zapisz</button>
				</center>
				<hr/>
				
			<?php
				
				$sql = "SELECT 	c.idComments 'ID_kom'
								,c.idPerson 'ID_osoba'
								,CONCAT(p.Name, ' ',p.Surname) 'Imie_Nazwisko'
								,pc.idComputers 'id_pc'
								,CONCAT(pc.ComputerName, ' ', pc.SerialNumber) 'PC_SN'
								,d.idDevice 'ID_urzadzenia'
								,CONCAT(d.NameDevice, ' ',d.Producer, ' ',d.Model) 'Nazwa_urzadzenia'
								,c.Comment 'Komentarz'
								,c.DateAdd 'Data_dodania_kom'
						FROM comments c LEFT JOIN person p ON c.idPerson=p.idPerson
										LEFT JOIN computers pc ON c.idComputers=pc.idComputers
										LEFT JOIN device d ON c.idDevice=d.idDevice
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
					<td> <textarea type="text" name="comments" maxlength="255" cols="70" rows="5"> </textarea></td>
					<td> 
						<input type="submit" value="Dodaj"> 
						<input type="hidden" name="user" value="12" />
						<input type="hidden" name="number" value="<?php echo $_GET['number']; ?>" />
					</td>
				</form>
				</tr>
				</table>
			<?php 
			
				if(isset($_POST['comments'])){
					mysql_query(addComments(11,$_GET['number'], $_POST['comments'])); 
					
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