<!DOCTYPE HTML>
<html>


<head>
  <meta charset="utf-8">
  <title>News Portal</title>
</head>


 <body>

<?php>
$user = 'root';
  $password = 'root';
  $db = 'news_db';
  $host = 'localhost';
  $port = 3307;
  $link = mysqli_init();
  $conn = mysqli_real_connect(
    $link, 
    $host, 
    $user, 
    $password, 
    $db,
    $port
  );

  if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
  } 

?>















  </body>
</html>