<?php
    // static
    define("HOSTNAME","localhost");
    define("HOST_USER","root");
    define("HOST_PASS","");
    define("DB_NAME","cr");

  try {
    $conn = mysqli_connect(HOSTNAME,HOST_USER,HOST_PASS,DB_NAME);
   
  } catch (mysqli_sql_exception $e) {
    throw $e; 
  }
?>