<?php
	require_once "function.php";
	
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<?php
		include_once "html_head.html";
		
	?>
	<title>System Ewidencji - Home</title>
</head>
<body>
	
	<div id="CONTAINER">
	
		<div id="BAR">
			<?php 
				include_once "html_bar.html";
			?>
		</div>
		
		<div id="CONTENT">
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
				
				echo '<table>
						<tr>
							<td>Lp.</td>
							<td>Model</td>
							<td>Numer seryjny</td>
							<td>Nazwa</td>
							<td>Nazwisko</td>
							<td>Imię</td>
							<td>Status</td>
							<td>Szyfrowany</td>
						</tr>';
				
				$row = mysql_fetch_assoc($query);
					echo '
						<a href="?&number='.$row['ID_PC'].'">
						<tr>
							<td>'.$row['Producent'].' '.$row['Model'].'</td>
							<td>'.$row['SN'].'</td>
							<td>'.$row['Nazwa'].'</td>
							<td>'.$row['Nazwisko'].'</td>
							<td>'.$row['Imie'].'</td>
							<td>'.$row['Status'].'</td>
							<td>'.yesORno($row['Czy_zaszyfrowany']).'</td>
						</tr>
						</a>';


				echo '</table>';
				
			
				mysql_free_result($query);
				mysql_close();
			?>
		</div>
		
		<div id="FOOTER">
			<?php
				include_once "html_footer.html";
			?>
		</div>
	</div>
	
</body>
</html>