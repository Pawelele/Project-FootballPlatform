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
    @$match_id = $_POST['match_id'];
    @$played = $_POST['played'];
    @$match_result = $_POST['result'];

    $connect->query('SET NAMES utf8');
    $connect->query('SET CHARACTER_SET utf8_unicode_ci');

    $zapytanie = "update Mecze set Rozegrany = '$played', Wynik = '$match_result' where Id_meczu = '$match_id'";

		$result = $connect->query($zapytanie);
    header("Location: ../coach_panel.php?status=success");
  }
?>