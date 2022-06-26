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
    @$sender = $_POST['sender'];
    @$groupNr = $_POST['group_nr'];
    @$target_group = $_POST['target_group'];
    @$message = $_POST['message'];

    $connect->query('SET NAMES utf8');
    $connect->query('SET CHARACTER_SET utf8_unicode_ci');

    $zapytanie = "insert into Ogloszenia (Nadawca, Id_grupy, Tresc, Dla_zawodnika) values ('".$sender."','".$groupNr."', '".$message."', '".$target_group."')";

		$result = $connect->query($zapytanie);
    header("Location: ../coach_panel.php?status=success");
  }
?>