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
    @$surname = $_POST['surname'];
    @$groupNr = $_POST['group_nr'];
    @$email= $_POST['email'];
    @$password = $_POST['password'];

    $connect->query('SET NAMES utf8');
    $connect->query('SET CHARACTER_SET utf8_unicode_ci');

    $zapytanie = "insert into Zawodnicy (Imie, Id_grupy, Nazwisko, Email, Haslo) values ('".$name."','".$groupNr."', '".$surname."', '".$email."', '".$password."')";

		$result = $connect->query($zapytanie);
    header("Location: https://www.paweluchanski.pl/football/coach_panel.php?status=success");
  }
?>