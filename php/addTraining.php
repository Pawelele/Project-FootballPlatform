<?php
  session_start();

  require_once "connect.php";
  if($connect->connect_errno!=0)
  {
    //echo "Error: ".$connect->connect_errno;
    echo "<br></nr>Błąd bazy danych";
  }
  else
  {
    echo "Połączenie nawiązane";
    @$adress = $_POST['adress'];
    @$groupNr = $_POST['group_nr'];
    @$duration = $_POST['duration'];
    @$date = $_POST['training_date'];
    @$time = $_POST['training_time'];

    $connect->query('SET NAMES utf8');
    $connect->query('SET CHARACTER_SET utf8_unicode_ci');

    $zapytanie = "insert into Treningi (Adres, Id_grupy, Czas_trwania, Data, Godzina) values ('".$adress."','".$groupNr."', '".$duration."', '".$date."', '".$time."')";

		$result = $connect->query($zapytanie);
    header("Location: https://www.paweluchanski.pl/football/coach_panel.php?status=success");
  }
?>