<?php
  session_start();
  unset($_SESSION["session_login"]);
  session_destroy();
  header("Location: ../?logout");
?>