<?php
  $con = new mysqli("localhost", "root", "", "db_chinarestaurant");

  if ($con->connect_error) {
    header('location: ../error');
  }
?>
