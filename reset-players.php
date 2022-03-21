<?php
require_once("config.php");
if(isset($_GET["token"]) && $_GET["token"] == "70acbeef398242c68435c4fdc99c8f36")
{
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      echo "ERROR: " . $conn->connect_error;
  } else {
      $sql = "UPDATE players SET played=0";
      if($conn->query($sql) == TRUE)
      {
        echo "Jugadores reiniciados.";
      } else {
        echo "Error reseteando jugadores.";
      }
  }
} else {
  echo "Token inválido.";
}
?>