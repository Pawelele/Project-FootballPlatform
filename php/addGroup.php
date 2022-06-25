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
    @$name = $_POST['name'];
    @$coachId = $_POST['coach_id'];
    @$groupAge = $_POST['group_age'];

    $connect->query('SET NAMES utf8');
    $connect->query('SET CHARACTER_SET utf8_unicode_ci');

    $zapytanie = "insert into Grupy (Nazwa, Id_trenera, Rocznik) values ('".$name."', '".$coachId."', '".$groupAge."')";

		$result = $connect->query($zapytanie);
    header("Location: ../coach_panel.php?status=success");
  }
?>