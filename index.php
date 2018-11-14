<?php
	include_once "PHP/config.php";
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<?php 	
		include_once PATH_TO_HTML_HEAD; 
	?>
	<title>SESK - System Ewidencji Sprzętu Komputerowego</title>
	
</head>
<body>
	
	<div id="CONTAINER">
	
		<div id="BAR">
			<b>&nbsp; System Ewidencji Sprzętu &nbsp;</b>
		</div>
		
		<div id="CONTENT_INDEX">
			<form action="#" class="main_form">
				Login: <input type="text" size="25" /><br/>
				Hasło: <input type="password" size="25" /> <br/>
				<input type="submit" value="Zaloguj" />
			</form>				
		</div>
		
		<div id="FOOTER">
			<?php 
				include_once PATH_TO_HTML_FOOTER;
			?>
		</div>
	</div>

</body>
</html> 