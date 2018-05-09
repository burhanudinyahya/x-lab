<?php 

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'xlab';

$link = mysqli_connect($host, $user, $pass, $db);

if (! $link) 
{
  echo "Error: Unable to connect to MySQL.<br>" . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . "<br>" . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}