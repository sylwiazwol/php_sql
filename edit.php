<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<title>Projekt</title>
	</head>
	<body class="bg-2">
		<?php
		include_once("authorization.php");
		$conn = mysql_connect($dbhost, $dbuser, $dbpass)
		or  die('Bład polączenia z serwerem: '.mysql_error());
		mysql_select_db($dbname)
		or die('Nie ma bazy o nazwie: '.$dbname);
		/////////////////////////////////////
		
			if($_GET['zapisz']!=1)
			{
				$wynik=mysql_query("SELECT * FROM Film WHERE id_filmu=".$_GET[id_filmu].";");
		echo '<div class="container">
						<div class="row">
								<div class="col-sm-12">';
									
									while($row=mysql_fetch_array($wynik))
									{
										echo '<h2>Wpisz polski tytuł wybranego filmu:</h2>
											Tytuł oryginalny: <i> '.$row['tytul'].'</i> <br>
										<form action="">
												Tytuł polski: <input name="polski"><br>
												<input type="hidden" name="zapisz" value="1">
												<input type="hidden" name="id_filmu" value="'.$row['id_filmu'].'">
												<input type="submit" value="Zapisz">
										</form>';
										
									}
						}
								else  		//zaktualizowanie danych
						{
							mysql_query("UPDATE Film SET tytul='".$_GET['polski']."' WHERE id_filmu='".$_GET['id_filmu']."'")
							or die ("Nie udało się zapisać danych do bazy");
							mysql_query("UPDATE AktorzyFilm SET tytul='".$_GET['polski']."' WHERE id_filmu='".$_GET['id_filmu']."'")
							or die ("Nie udało się zapisać danych do bazy");
										
							echo 'Dane zapisane <br>';
							echo 'Powrót na stronę: <a href="filmy.php">Filmy</a><br>';
							echo '<a href="index.php">Powrót na stronę główną</a>';
						}
						echo ' </div>
					</div>
			</div>';
		?>
	</body>
</html>