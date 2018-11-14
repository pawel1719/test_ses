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
	<title>System Ewidencji - Użytkownicy</title>
</head>
<body>
	
	<div id="CONTAINER">
	
		<div id="BAR">
			<?php 
				include_once PATH_TO_HTML_BAR;
			?>
		</div>
		
		<div id="CONTENT">
			<?php
			
				define('NUMBER_OF_RESULTS_PER_PAGE', 25);
				
				connectDB();
				
				if(isset($_GET['page']) != true){
					$_GET['page'] = 0;
				}
				
				//QUERY TO DATABASE 
				$SQL = "SELECT 	Surname 'Nazwisko'
						,Name 'Imie'
						,d.Department 'Departament'
						,c.NameCity 'Miasto'
						,NumberPhone 'Telefon'
						,DateEmployment  
						,Work
						,DateRelease 
					FROM person p LEFT JOIN department d ON p.idDepartment=d.idDepartment
								  LEFT JOIN city c ON p.idCity=c.idCity
					ORDER BY Surname, Name ASC
					LIMIT ".mysql_escape_string((int)$_GET['page']*NUMBER_OF_RESULTS_PER_PAGE).",".NUMBER_OF_RESULTS_PER_PAGE;
				$counter = $_GET['page']*NUMBER_OF_RESULTS_PER_PAGE+1;
				
				$query = mysql_query($SQL);
				echo '<table>';
				echo '	<tr>
							<td>Nr.</td>
							<td>Imię</td>
							<td>Nazwisko</td>
							<td>Departament</td>
							<td>Miasto</td>
							<td>Nr. telefonu</td>
							<td>Data zatrudnienia</td>
							<td>Data zwolnienia</td>
						</tr>';
						
				while($row = mysql_fetch_assoc($query))
				{	
					echo '<tr>';
					echo '<td>'.$counter.'</td>';
					echo '<td>'.$row['Nazwisko'].'</td>';
					echo '<td>'.$row['Imie'].'</td>';
					echo '<td>'.$row['Departament'].'</td>';
					echo '<td>'.$row['Miasto'].'</td>';
					echo '<td>'.$row['Telefon'].'</td>';
					echo '<td>'.$row['DateEmployment'].'</td>';
					echo '<td>'.$row['DateRelease'].'</td>';
					$counter++;
					echo '</tr>';
				}
				echo '</table>';
				
				$SQL = "SELECT COUNT(*) FROM person as Ilosc";
				$query= mysql_query($SQL);
				list($iloscWpisow) = mysql_fetch_row($query);
				
				echo '<center>';
				
				if($_GET['page'] !=0 ){
					//Link to the first page if it isn't the first one
					echo '<a href="?page='.($_GET['page'] - $_GET['page']).'"><button> << </button></a> ';
				}
				
				if($_GET['page']>0){ 
					//Link to the previous page
				   echo '<a href="?page='.($_GET['page']-1).'"><button> < </button></a> ';
				}
				
				for($i = 0; $i<=floor($iloscWpisow/NUMBER_OF_RESULTS_PER_PAGE); $i++){
				   echo '<a href="?page='.($i).'"><button>'.($i + 1).'</button></a> ';
				}
				
				if($_GET['page']<floor($iloscWpisow/NUMBER_OF_RESULTS_PER_PAGE)){ 
				  //Link to the next page
				   echo ' <a href="?page='.($_GET['page']+1).'"><button> > </button></a> ';
				}
				
				if($_GET['page'] != floor($iloscWpisow/NUMBER_OF_RESULTS_PER_PAGE) ){
					//Link to the last page if it isn't the last one
					echo '<a href="?page='.($_GET['page'] + floor($iloscWpisow/NUMBER_OF_RESULTS_PER_PAGE)).'"><button> >> </button></a> ';
				}
				
				echo '</center>';
				mysql_free_result($query);
				
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