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
			if($_GET['zapisz']!=1)
			{
				$wynik=mysql_query("SELECT * FROM Aktorzy WHERE id_aktora=".$_GET['id_aktora'].";");
				
				$idA=$_GET['id_aktora'];
		echo '<div class="container">
					<div class="row">
							<div class="col-sm-12">';
									echo '<h2>Dodaj film do bazy</h2>';
									while($row=mysql_fetch_array($wynik))
									{
										echo '<p>Dodaj film, w który grał wybrany aktor:</p>';
										echo '<p>Aktor: '.$row['imie'].' '.$row['nazwisko'].'</p>';
								}
								echo '<form action="" method="POST">
												Tytuł filmu:<br>
												<input type="text" name="tytul"><br>
												Rok produkcji: <br>
												<input type="number" name="rok" required><br>
												Czas trwania:<br>
												<input type="number" name="czas" required><br>
												Kraj produkcji:<br>
												<input type="text" name="kraj" required><br><br>
											<input type="reset" value="Wyczyść" class="btn btn-danger">
											<input type="submit" value="Wyślij" class="btn btn-success">
											<input type="hidden" name="zapisz" value="1">
								</form> ';
						}
					echo '</div>
				</div>
		</div>';
		///////////////////////////////////////////////
		//wpisanie danych do tabeli Film
		if($_POST['tytul']!=""){
		
			mysql_query("INSERT INTO Film (tytul, rok_produkcji, czas_trwania, kraj)
					VALUES ('".$_POST["tytul"]."','".$_POST["rok"]."','".$_POST["czas"]."','".$_POST["kraj"]."')")
					or die ('Nie dodano filmu do bazy.');
			//wpisanie danych do tabeli AktorzyFilm
			$idFilmu= "SELECT id_filmu FROM Film WHERE tytul='".$_POST["tytul"]."'";
			$id=mysql_query($idFilmu);
			while($row=mysqli_fetch_array($id))
			{
				$nrFilmu = $row[0];  //id_filmu , który został dodany do bazy
			}
			mysql_query("INSERT INTO AktorzyFilm VALUES ('".$idA."', '".$nrFilmu."', '".$_POST['tytul']."', '".$_POST["rok"]."')")
					or die ('Nie udało się zapisać filmu w bazie');
		echo 'Wpisane dane przesłano do bazy<br><br>';
		echo 'Powrót do strony: <a href="actors.php">Aktorzy</a><br>';
		echo '<a href="index.php">Powrót do głównej strony</a><br>';
		}
		///////////////
		?>
	</body>
</html>