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
  $db = 'test';
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

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } 


$sql = ("SELECT id, author, date, title, context FROM newsnews");
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result)> 0){
	while($row = mysqli_fetch_assoc($result)) {
	?>  
    <div class="news_block">
      <div class="news_title"> 
      </div>
         <b><? echo $row["author"], " ", $row["date"]; ?></b>
      <p><? echo $row["context"]; ?></p>
    <? } }?>
    </div>

  </body>
</html>