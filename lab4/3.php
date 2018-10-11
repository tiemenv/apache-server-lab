<?php
header("X-XSS-Protection: 0;");
/* DOM XSS */
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
				<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="text"  name="alert">
				<button class="jscolor {valueElement:'chosen-value', onFineChange:'setTextColor(this)'}">
					Pick text color
				</button>

				HEX value: <input id="chosen-value" name="color" value="000000">

			  <input type="submit" value="Submit">
			</form><br>
<?php
if (isset($_GET["alert"])) 
{
	$javascriptAlert = array("javascript", "oninput", "onstart", "onkeydown", "onkeypress", "onkeyup","onpaste","onload","onreadystatechange","onreadystatechange","onsubmit","onmousedown","onmousemove","onmouseover","onfocus", "onselect", "onchange");
	$htmlAlert = array("iframe", "href", "figure", "article", "input", "marquee", "h1");
	
	
  $param = strtolower($_GET["alert"]);

	if(strpos($param, '<') !== true && strpos($param, '>') !== true )
	{
		if (strpos($param, '<script>') !== true)
		{
			$param = str_replace("<script>", "<scr.pt>", $param);
		}
	
		foreach ($javascriptAlert as &$value) 
		{
			if(strpos($param, $value) !== true)
			{
				$param = str_replace($value, "<noJS>", $param);
			}
		}
	
		foreach ($htmlAlert as &$value) 
		{
			if(strpos($param, $value) !== true)
			{
				$param = str_replace($value, "<noHTML>", $param);
				
			}
		}
		echo "<p style=\"color: #" . trim($_GET["color"]) . ";\">" . $param . "</p>";
	}
}
		?>
	</div>
	<script src="jscolor.js"></script>

	</body>
</html>