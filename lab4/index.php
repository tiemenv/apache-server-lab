<?php
header("X-XSS-Protection: 0;");
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Labs Web Security</title>
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
        <p class="lead cover-copy">Lab 4 - Protecting against XSS</p>
        Create a username to continue!
        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  <input type="text"  name="username">
			  <input type="submit" value="Submit">
			</form><br>
      <?php
      if (isset($_GET["username"])) 
      {
        echo "Welcome: " . $_GET["username"] . ".";

        session_start();
        //Store the name in the session
        $_SESSION['userlogin'] = $_GET["username"];
      }
    ?>
    <br>
    <a href = "1.php">XSS 1</a><br>
    <a href = "2.php">XSS 2</a><br>
    <a href = "3.php">XSS 3</a>
    	</div>
  </body>
</html>