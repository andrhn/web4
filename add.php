<!DOCTYPE HTML>
  <html>
  	<head>
  		<meta charset="utf-8">
  		<title>Add News</title>
		</head> 

    <body>
    	<?php
    	$author = $title = $context  = "";
    	if ($_SERVER["REQUEST_METHOD"] == "POST"){
    	 if (empty($_POST["author"])) {
            $authErr = "Name is required";
        } else {
            $auth = test_input($_POST["author"]);
            $title = test_input($_POST["title"]);
            $context = test_input($_POST["context"]);
    }}

		function test_input($data) {
		        $data = trim($data);
		        $data = stripslashes($data);
		        $data = htmlspecialchars($data);
		        return $data;
		      }

 ?>
    <div class="header">Add news</div>
    <form method="post" class="add_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      <p>Author: </p>
      <input type="text" name="author">
      <span class="error">* <?php echo $authErr;?></span>
      <p>Title: </p>
      <input type="text" name="title">
      <p>Context:</p> 
      <textarea name="context" rows="5" cols="40"></textarea>
      <p><input type="submit" name="submit" value="Submit" style="width: 100px;"</p>  
    </form>



<?
if( isset( $_POST['submit'] ) )
      {
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

				if (!$link) {
    			die("Connection failed: " . mysqli_connect_error());
				}


				$sql = ("INSERT INTO newsnews (author, title, context) VALUES ('$author', '$title', '$context')");
				if (mysqli_query($link, $sql)) {
    			echo "New record created successfully. In 5 secs you will be redirected to the main page";
    			header("Refresh: 5; url=main.php");
				} else {
    			echo "Error: " . mysqli_error($link);
				}
				mysqli_close($link);
    	}
    ?>




    </body>
