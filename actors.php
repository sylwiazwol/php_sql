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
	<body class="bg-3">
		<?php
		include_once("authorization.php");
		$conn = mysql_connect($dbhost, $dbuser, $dbpass)
		or  die('Bład polączenia z serwerem: '.mysql_error());
		mysql_select_db($dbname)
		or die('Nie ma bazy o nazwie: '.$dbname);
		/////////////////////////////////////
		
		//wyświetla się tabela z nazwiskami aktorów
		$wynik = mysql_query("SELECT * FROM Aktorzy;");
		echo '<div class="container">
					<div class="row">
							<div class="col-sm-12">';
									echo '<h1>Aktorzy</h1>';
									echo '<h2>Aktorzy wpisani do bazy danych</h2>';
									echo '<p>Można zaktualizować dane
												<ul>
													<li> dopisując film, w którym zagrał wybrany aktor</li>
													<li> dodając nowego aktora do tabeli, klikając <a href="addActor.php">tutaj</a></li>
												</ul>
											</p>';
											echo '<table class="table table-striped">
														<tr>
															<th>Imie</th>
															<th>Nazwisko</th>
															<th>Dodaj film</th>';
													echo'</tr>';
														while($row=mysql_fetch_array($wynik))
														{
															echo'<tr>
																	<td>'.$row[1].'</td>
																	<td>'.$row[2].'</td>
																	<td><a href="addActor.php?id_aktora='.$row['id_aktora'].'">dodaj</a></td>
																</tr>';
														}
											echo '</table>';
						echo '</div>';
				//////////////////////////////
				//wyszukaj aktora
				echo '<div class="col-sm-12">';
						echo '<h2>Wyszukaj więcej informacji o wybranym aktorze</h2>';
								include_once("find.php");
				echo '</div>';
				echo '<div class="col-sm-12">
							Przejdź do strony: <a href="filmy.php">Filmy</a><br>
							<a href="index.php">Wróć na stronę główną</a>
				</div> ';
			echo'	</div>
		</div>';
		?>
	</body>
</html>
