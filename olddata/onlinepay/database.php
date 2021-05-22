<?php
  define('HOST','localhost');
  define('DB','jaysutra');
  define('USER','jaysutra');
  define('PASS','amF5c3V0cmEyMDIw');

  /* Database Connections */
  $connection =new mysqli(HOST,USER,PASS,DB);
    if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
   return $connection;
?>