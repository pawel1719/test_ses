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
				
				if(isset($_GET['page']) != true ){
					$_GET['page'] = 0;
				}
				$_GET['number'] = 1;
				
				$sql = "SELECT 	 pc.idComputers 'ID_PC'
						,pc.Producer 'Producent'
						,pc.Model 'Model'
						,pc.ComputerName 'Nazwa'
						,pc.SerialNumber 'SN'
						,p.Surname 'Nazwisko'
						,p.Name 'Imie'
						,s.Status 'Status'
						,pc.Encrypted 'Czy_zaszyfrowany'
				FROM computers pc LEFT JOIN person p ON pc.idPerson=p.idPerson
								  LEFT JOIN statuscomputer s ON pc.idStatusComputer=s.idStatusComputer
				LIMIT ".mysql_escape_string((int)$_GET['page']*NUMBER_OF_RESULT_PER_PAGE).",".NUMBER_OF_RESULT_PER_PAGE;
				$counter = $_GET['page']*NUMBER_OF_RESULT_PER_PAGE+1;
				
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
				
				while( $row = mysql_fetch_assoc($query))
				{
					echo '
						
						<tr>
							<td>'.$counter.'</td>
							<td><a href="homes.php?number='.$row['ID_PC'].'">'.$row['Producent'].' '.$row['Model'].'</a></td>
							<td><a href="homes.php?number='.$row['ID_PC'].'">'.$row['SN'].'</a></td>
							<td><a href="homes.php?number='.$row['ID_PC'].'">'.$row['Nazwa'].'</a></td>
							<td><a href="homes.php?number='.$row['ID_PC'].'">'.$row['Nazwisko'].'</a></td>
							<td><a href="homes.php?number='.$row['ID_PC'].'">'.$row['Imie'].'</a></td>
							<td>'.$row['Status'].'</td>
							<td>'.yesORno($row['Czy_zaszyfrowany']).'</td>
						</tr>';
					$counter++;
				}
				echo '</table>';
				
				$sql = "SELECT COUNT(*) FROM computers Ilosc";
				$query = mysql_query($sql);
				list( $iloscWpisow ) = mysql_fetch_row($query);
				
				echo '<center>';
				
				for( $i = 0; $i <= floor($iloscWpisow/NUMBER_OF_RESULT_PER_PAGE); $i++){
					echo ' <a href="?page='.($i).'"><button>'.($i+1).'</button></a> ';
				}
				
				echo '</center>';
				
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