<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exam Web Pentesting</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/screen.css" rel="stylesheet" type="text/css"/>
  </head>
  <body id="top"><div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
      <div class="masthead clearfix">
        <div class="inner">
          
        </div>
      </div><br>
	  </div>
	  <div class="inner cover">
        <h1 class="cover-heading">Welcome to the labs</h1>
        <h1 class="cover-heading">Apache - Web Security</h1>
        <p class="lead cover-copy">Lab 5 - Protecting against SQLi</p>
        <p class="lead cover-copy">
		

<?php	
if (isset($_GET["ID"])) 
{
	include("security.php");
	// Create connection
	$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM itemDetails WHERE ID = '" . $_GET["id"] . "')";
	$result = $conn->query($sql);
	echo $sql . '<br><br>';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo $row["ID"] . "<br>";
			echo $row["name"] . "<br>";
			echo $row["description"] . "<br>";
			echo "<a href = location.php?id=" . $row["locationID"] . ">location</a>";		
		}
	}
	else
	{
	echo "Error: Can't find info.";
	}
$conn->close();
}
?>
		</p>
      </div>
  </body>
</html>