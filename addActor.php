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
	<body class="bg-4">
		<?php
		include_once("authorization.php");
		$conn = mysql_connect($dbhost, $dbuser, $dbpass)
		or  die('Bład polączenia z serwerem: '.mysql_error());
		mysql_select_db($dbname)
		or die('Nie ma bazy o nazwie: '.$dbname);
		///////////////////////////////////////////////
		// dodawanie aktora do bazy
		echo '<div class="container">
					<div class="row">
							<div class="col-sm-12">';
								echo '<h2>Dodaj aktora do bazy</h2>';
								echo '<form action="" method="POST">
										Imie:<br>
										  <input type="text" name="imie"><br>
									    Nazwisko: <br>
										  <input type="text" name="nazwisko" required><br>
										Data urodzenia (według wzoru: rrrr-mm-dd):<br>
										  <input type="text" name="data" required><br>
										Kraj pochodzenia:<br>
										  <input type="text" name="kraj" required><br><br>
										  <input type="reset" value="Wyczyść" class="btn btn-danger">
										  <input type="submit" value="Wyślij" class="btn btn-success">
									  </form> ';
					echo '</div>
				</div>
		</div>';
		///////////////////////////////////////////////
		//wykona polecenia, jeśli tytuł nie będzie pusty
		if($_POST['imie']!=""){
		mysql_query("INSERT INTO Aktorzy (imie, nazwisko, data_ur, kraj_pochodzenia) VALUES ('".$_POST["imie"]."','".$_POST["nazwisko"]."','".$_POST["data"]."','".$_POST["kraj"]."')") or die ('Nie dodano aktora do bazy.');
			
		echo 'Wpisane dane przesłano do bazy<br>';
		echo 'Powrót na stronę: <a href="actors.php">Aktorzy</a><br>';
		echo '<a href="index.php">Powrót na stronę główną</a>';
		}
		?>
	</body>
</html>
