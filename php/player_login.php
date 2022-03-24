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
    @$login_email = $_POST['player_email'];
    @$login_password = $_POST['player_password'];

    @$sql = "SELECT * FROM users WHERE email='$login_email'";

    if($res = @$connect->query($sql))
    {
      echo "Zapytanie wyslane";
      $logged = false;
      $users_number = $res->num_rows;
      if($users_number>0)
      {
        echo "Jest taki uzytkownik";
        while($row = mysqli_fetch_assoc($res))
        {
          if($row['password'] == $login_password)
          {
            echo "Wszystko sie zgadza, przekierowuje";
            $_SESSION["user_id"] = $row['id'];
            header("Location: ../player_panel.php");
            $logged = true;
            $_SESSION["session_login"] = true;
          }
        }
      }
      else
      {
        if($logged == false && @$_POST['player_email'] != null)
        {
          header("Location: https://www.paweluchanski.pl/football?status=error");
        }
      }
    }
  }
?>