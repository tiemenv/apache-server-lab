<?php
header("X-XSS-Protection: 0;");
/*
Stored XSS
*/
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
				<?php
					session_start();
   				//Read your session (if it is set)
   				if (isset($_SESSION['userlogin']))
					echo "Welcome " . $_SESSION['userlogin'];
					?>
					<br>

				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  <input type="text"  name="alert">
			  <input type="submit" value="Submit">
			</form><br>
<?php
if (isset($_POST["alert"])) 
{
		
//		echo $param;	
$myFile = $_SESSION['userlogin'] . ".json";

  try
  {

	   //Get form data
	   $formdata = array(
	      'userName'=>  $_SESSION['userlogin'],
	      'comment'=> $param,
		 );
		 
	

	   //Get data from existing json file
	   $jsondata = file_get_contents($myFile);
	   // converts json data into array
	   $arr_data = json_decode($jsondata, true);

	   // Push user data to array
			$arr_data[] = $formdata;
		

		
       //Convert updated array to JSON
	   $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
	   
	   //write json data into data.json file
	   if(file_put_contents($myFile, $jsondata)) {
	        echo 'Data successfully saved<br>';
	    }
	   else 
	        echo "Error<br>";
   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
	 }
	 
	}
}

$myFile = $_SESSION['userlogin'] . ".json";
if (!file_exists($myFile)) {
	touch($myFile);
}
$arr_data = array(); // create empty array
try
  {
	   //Get data from existing json file
	   $jsondata = file_get_contents($myFile);

	   // converts json data into array
	   $arr_data = json_decode($jsondata, true);
		if(is_array($arr_data))
		{
			
			foreach ($arr_data as &$value) {
				$count = 0;
				foreach ($value as &$item) {
					if($count == 0)
					{
						echo "Username: " . $item;
						$count++;
					}
					else
					{
						echo " - Message: " .  $item . "<br>	";
					}
				}
		}
	
		}
   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
?>
	</div>
  </body>
</html>