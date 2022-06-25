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
    @$player_id = $_POST['player_id'];
    @$date = $_POST['date'];
    @$absent_type = $_POST['absent_type'];

    $connect->query('SET NAMES utf8');
    $connect->query('SET CHARACTER_SET utf8_unicode_ci');

    $zapytanie = "insert into Nieobecnosci (Data, id_zawodnika, Typ) values ('".$date."', '".$player_id."', '".$absent_type."')";

		$result = $connect->query($zapytanie);
    header("Location: ../coach_panel.php?status=success");
  }
?>