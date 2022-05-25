<?php
  session_start();
  unset($_SESSION["session_login"]);
  session_destroy();
  header("Location: https://www.paweluchanski.pl/football?logout");
?>