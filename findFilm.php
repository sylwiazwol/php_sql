<?php
/////////////////////////////////////////////
//formularz
echo '<div class="container">
					<div class="col-sm-12">';
						echo '<form action="" method="post">
								Tytuł filmu:<br>
									<input name="title"> <br><br>
									<input type="reset" value="Wyczyść">
									 <input type="submit" value="Wyszukaj">
								</form>
						    	<br><br>';
			echo '</div>
			</div>';
			
	//////////////////////////////
	if($_POST['title']!="")
	{
			$wynik=mysql_query( "SELECT imie, nazwisko FROM Aktorzy JOIN AktorzyFilm ON Aktorzy.id_aktora=AktorzyFilm.id_aktora AND tytul='".$_POST['title']."'; ");
		
	//////////////////
	//wyświetlanie aktorów z danego filmu
	echo '<div class="container">
				<div class="row">
					<div class="col-sm-12">';
						echo '<h3>W filmie <i>'.$_POST['title'].'</i> wystąpili:</h3>';
							echo'<table class="table table-striped">
									<tr>
										<th>Imie</th>
										<th>Nazwisko</th>
									</tr>';
										while($row=mysql_fetch_array($wynik))
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
