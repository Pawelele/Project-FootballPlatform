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
    @$rival = $_POST['rival'];
    @$matchType = $_POST['match_type'];
    @$date = $_POST['match_date'];
    @$time = $_POST['match_time'];

    $connect->query('SET NAMES utf8');
    $connect->query('SET CHARACTER_SET utf8_unicode_ci');

    $zapytanie = "insert into Mecze (Adres, Id_grupy, Przeciwnik, Typ_meczu, Data, Godzina) values ('".$adress."','".$groupNr."', '".$rival."', '".$matchType."', '".$date."', '".$time."')";

		$result = $connect->query($zapytanie);
    header("Location: ../coach_panel.php?status=success");
  }
?>