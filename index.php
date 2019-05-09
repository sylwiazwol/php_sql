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
  <body class="index">
    <?php
    
    include_once("authorization.php");
    $conn = mysql_connect($dbhost, $dbuser, $dbpass)
    or  die('Bład polączenia z serwerem: '.mysql_error());
    mysql_select_db($dbname)
    or die('Nie ma bazy o nazwie: '.$dbname);
    /////////////////////////////////////
    echo '
    <div class="container">
        <div class="row">
        <div class="col-sm-6 actor">
          <a href="actors.php">Aktorzy</a>
        </div>
          <div class="col-sm-6 film" >
          <a href="filmy.php">Filmy</a>
        </div>
      </div>
    </div>';
    
    ?>
  </body>
</html>