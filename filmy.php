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
	<body class="bg-1">
		<?php
		include_once("authorization.php");
		$conn = mysql_connect($dbhost, $dbuser, $dbpass)
		or  die('Bład polączenia z serwerem: '.mysql_error());
		mysql_select_db($dbname)
		or die('Nie ma bazy o nazwie: '.$dbname);
		/////////////////////////////////////
		//potwierdź usunięcie danego filmu
			if($_GET['potwierdz']==1)
			{
				mysql_query("DELETE FROM AktorzyFilm WHERE id_filmu=".$_GET['id_filmu'].";")
				or die ("Nie udało się");  //usuwa film z tabeli AktorzyFilm
				mysql_query("DELETE FROM Film WHERE id_filmu=".$_GET['id_filmu'].";")
				or die ("Nie udało się"); //usuwa film z tabeli Film
			}
			
			//sortowanie tabeli
		$sql ="SELECT * FROM Film";
		if ($_GET['orderby'] == 'title')
		{
		$sql = "SELECT * FROM Film ORDER BY tytul";
		}
		elseif ($_GET['orderby'] == 'dlugosc')
		{
		$sql = "SELECT * FROM Film ORDER BY czas_trwania";
		}
		elseif ($_GET['orderby'] == 'rok')
		{
		$sql = "SELECT * FROM Film ORDER BY rok_produkcji";
		}
		$result=mysql_query($sql);
		echo '<div class="container">
					<div class="row">
							<div class="col-sm-12">';
								echo '<h1>Filmy</h1>';
								echo '<h2>Filmy znajdujące się w bazie danych</h2>';
							
									echo '<table class="table table-striped">';
											echo'<tr>
													<th><a href="filmy.php?orderby=title">Tytuł</a></th>
													<th><a href="filmy.php?orderby=rok">Rok produkcji</a></th>
													<th><a href="filmy.php?orderby=dlugosc">Czas trwania (min)</a></th>
													<th>Kraj</th>
													<th>Edytuj</th>
													<th>Usuń</th>
												</tr>';
										while($row=mysql_fetch_array($result))
										{
										echo '<tr>
												<td>'.$row[1].'</td>
												<td>'.$row[2].'</td>
												<td>'.$row[3].'</td>
												<td>'.$row[4].'</td>
												<td><a href="edit.php?id_filmu='.$row[id_filmu].'">Edytuj</a></td>';
													
												if($_GET['usun']==$row[id_filmu])
												{
													echo '<td><a href="filmy.php?id_filmu='.$row[id_filmu].' &potwierdz=1">Potwierdz</a></td>';
												}
												else{
												echo '<td><a href="filmy.php?id_filmu='.$row[id_filmu].' &usun='.$row[id_filmu].'">Usuń</a></td>';
													}
										echo '</tr>';
										}
								echo '</table>';
						echo '</div>';
				//wyszukaj film
				echo '<div class="col-sm-12">';
						echo '<h2>Zobacz, kto grał w wybranym przez Ciebie filmie:</h2>';
								include_once("findFilm.php");
				echo '</div>';
				echo '<div class="col-sm-12">
							Przejdź do strony: <a href="actors.php">Aktorzy</a><br>
							<a href="index.php">Wróć na stronę główną</a>
				</div> ';
					echo'		</div>
			</div>';
		?>
	</body>
</html>
