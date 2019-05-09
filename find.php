<?php
/////////////////////////////////////////////
//formularz
echo '<div class="container">
			<div class="col-sm-12">';
					echo '<form action="" method="post">
							Imie:<br>
								<input name="imie"> <br>
							Nazwisko: <br>
								<input name="nazwisko"> <br><br>
								<input type="reset" value="Wyczyść">
								<input type="submit" value="Wyszukaj">
						</form>
						<br><br>';
					echo '</div>
			</div>';
			
	//////////////////////////////
	if(($_POST['imie']!="")&&($_POST['nazwisko']!=""))
	{
			$wynik=mysql_query( "SELECT * FROM Aktorzy WHERE imie='".$_POST['imie']."' AND nazwisko='".$_POST['nazwisko']."'; ");
		
	//////////////////
	//dane osobowe aktora z tabeli Aktorzy
	echo '<div class="container">
				<div class="row">
						<div class="col-sm-12">';
							echo '<h3>Szczegółowe informacje o aktorze/aktorce</h3>';
								echo'<table class="table table-striped">
										<tr>
											<th>Imie</th>
											<th>Nazwisko</td>
											<th>Data urodzenia</td>
										    <th>Kraj pochodzenia</td>
								        </tr>';
							
								while($row=mysql_fetch_array($wynik))
								{
								echo'<tr>
										<td>'.$row[1].'</td>
										<td>'.$row[2].'</td>
										<td>'.$row[3].'</td>
										<td>'.$row[4].'</td>
									</tr>';
								}
			            	echo '</table>';
		          echo '</div>';
///////////////////
//filmy, w których grał dany aktor
	$film = mysql_query("SELECT tytul, rok_produkcji FROM Aktorzy JOIN AktorzyFilm ON Aktorzy.id_aktora = AktorzyFilm.id_aktora AND imie='".$_POST['imie']."' AND nazwisko='".$_POST['nazwisko']."';");
echo '<div class="col-sm-12">';
	echo '<h3>Filmy, w których grała wybrana osoba</h3>';
		echo '<table class="table table-striped">
						<tr>
							<th>Tytuł</th>
							<th>Rok</th>
						</tr>';
										
					while($row=mysql_fetch_array($film))
					{
					echo'<tr>
							<td>'.$row[0].'</td>
							<td>'.$row[1].'</td>
						</tr>';
					}
		echo '</table>';
	echo '</div>';
	
echo '</div>
</div>';
}
?>
