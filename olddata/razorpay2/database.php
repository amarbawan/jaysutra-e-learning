<?php
  define('HOST','localhost');
  define('DB','payment_gateway');
  define('USER','root');
  define('PASS','');

  /* Database Connections */
  $connection =new mysqli(HOST,USER,PASS,DB);
    if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
   return $connection;
?>