<?php
  session_start();

  require_once "connect.php";
  if($connect->connect_errno!=0)
  {
    echo "Error: ".$connect->connect_errno;
  }
  else
  {
    @$login_email = $_POST['player_email'];
    @$login_password = $_POST['player_password'];

    @$sql = "SELECT * FROM Zawodnicy WHERE email='$login_email'";

    if($res = @$connect->query($sql))
    {
      $logged = false;
      $users_number = $res->num_rows;
      if($users_number>0)
      {
        while($row = mysqli_fetch_assoc($res))
        {
          if($row['Haslo'] == $login_password)
          {
            $_SESSION["player_id"] = $row['id_zawodnika'];
            $_SESSION["group_id"] = $row['Id_grupy'];
            header("Location: ../player_panel.php");
            $logged = true;
            $_SESSION["session_login"] = true;
            $_SESSION["session_type"] = "player";
          }
        }
      }
      else
      {
        header("Location: https://www.paweluchanski.pl/football?status=error");
      }
    }
  }
?>