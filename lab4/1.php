<?php
/*
Reflected XSS
*/
header("X-XSS-Protection: 0;");
?>

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
        <p class="lead cover-copy">Lab 4 - Protecting against XSS</p>
				<?php
					session_start();
   				//Read your session (if it is set)
   				if (isset($_SESSION['userlogin']))
					echo "Welcome " . htmlentities($_SESSION['userlogin']);
					?>
					<br>
				Use this page to store a one time message for someone!
        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  <input type="text"  name="alert">
			  <input type="submit" value="Submit">
			</form><br>
		<?php
if (isset($_GET["alert"])) 
{
	
  $param = strtolower(htmlentities($_GET["alert"]));

	// $javascriptAlert = array("script", "javascript", "onload", "oninput", "onstart", "onkeydown", "onkeypress", "onkeyup","onpaste","onreadystatechange","onreadystatechange","onsubmit","onmousedown","onmousemove","onmouseover","onfocus", "onselect", "onchange");
	// $htmlAlert = array("href", "figure", "article", "input", "marquee", "iframe", "button");

	// foreach ($javascriptAlert as &$value) 
	// {
	// 	if(strpos($param, $value) !== true)
	// 	{
	// 		$param = str_replace($value, "noJS", $param);
	// 	}
	// }

	// foreach ($htmlAlert as &$value) 
	// {
	// 	if(strpos($param, $value) !== true)
	// 	{
	// 		$param = str_replace($value, "noHTML", $param);
			
	// 	}
	// }
		
	echo $param;
}
?>
		</p>
		<a href = "index.php">Back..</a>
      </div>
  </body>
</html>