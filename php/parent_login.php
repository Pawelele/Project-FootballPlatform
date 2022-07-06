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
    @$login_email = $_POST['parent_email'];
    @$login_password = $_POST['parent_password'];

    @$sql = "SELECT Rodzice.Id_rodzica as Id_R, Rodzice.Imie as Imie_R, Rodzice.Nazwisko as Nazwisko_R, Rodzice.Haslo as Haslo_R ,Zawodnicy.Id_grupy as Id_G FROM Rodzice join Zawodnicy on Rodzice.Id_rodzica = Zawodnicy.Id_rodzica WHERE Rodzice.Email = '$login_email'";

    if($res = @$connect->query($sql))
    {
      $logged = false;
      $users_number = $res->num_rows;
      if($users_number>0)
      {
        while($row = mysqli_fetch_assoc($res))
        {
          if($row['Haslo_R'] == $login_password)
          {
            echo 'siemano';
            $_SESSION["user_id"] = $row['Id_R'];
            header("Location: ../parent_panel.php");
            $logged = true;
            $_SESSION["session_login"] = true;
            $_SESSION["session_type"] = "parent";
            $_SESSION["name"] = $row['Imie_R'];
            $_SESSION["surname"] = $row['Nazwisko_R'];
            $_SESSION["group_id"] = $row['Id_G'];

          }
        }
      }
      else
      {
        header("Location: ../?status=error");
      }
    }
  }
?>