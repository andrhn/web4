<!DOCTYPE HTML>
<html>


<head>
  <meta charset="utf-8">
  <title>News Portal</title>
  <link rel="stylesheet" href="style.css">
</head>


 <body>
<div class="header">News</div>
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
      <div class="delete">
        <a href="main.php?a=delete&id= <? echo $row["id"]; ?>">delete</a>
     </div>

    <? }} else {?>
    <p>Oops...database is empty</p>
<?}
mysqli_close($link);


if (isset($_GET["a"])) {
  if ($_GET["a"] == "delete"){
  $id = $_GET["id"];


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

  $query = "DELETE FROM newsnews WHERE id=$id";
  if (mysqli_query($link, $query)) {
    header("Refresh: 3; url=main.php");
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($link);
  }

  mysqli_close($link);

}}
?>

    
  </body>
</html>