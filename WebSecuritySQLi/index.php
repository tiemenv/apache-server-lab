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
				Login or register to continue.
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				Username: <input type="text"  name="username"><br>
				Password: <input type="password"  name="password"><br><br>
			<input type="submit" value="Submit">
			</form>
			<br>

<?php	
if (isset($_POST["username"])) 
{
	include("security.php");
	// Create connection
	$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "' AND (password = '" . $_POST["password"] . "')";
	$result = $conn->query($sql);
	echo $sql . '<br><br>';
	if ($result->num_rows > 0) {
			//set session
			echo "Welcome.";
	}
	else
	{
		$sql = "INSERT INTO users ('username', 'password') VALUES ( '". $_POST["username"] . "', '" . $_POST["password"] . "')";
		$result = $conn->query($sql);
		echo $sql . '<br><br>';
	}
$conn->close();
?>
<form method="POST" action="search.php">
searchterms: <input type="text"  name="search"><br>
<input type="submit" value="Submit">
</form>

<?php
}
?>
		</p>
      </div>
  </body>
</html>