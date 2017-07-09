<!DOCTYPE html>
<html width="100%" height="100%">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="styles.css" />
        <title>choose your service</title>
    </head>

<body  bgcolor=" #00Afff">


<div align="center">
    <h1> Welcome to our APP </h1> 
    <h2>  Please choose your service </h2> 

<table width="1000" border="1">
<tr>

<br>
<th><h1>service</h1></th>
<th><h1>site</h1></th>



<br><br>

<?php

   


//   if($_POST['password']) 
//		echo $_POST['password'], "<BR>";
//   else echo" password is not correct", "<BR>";
   $password = $_POST['password'];

  $host        = "host=212.237.28.119";
  $port        = "port=5432";
  $dbname      = "dbname=limedb";
  $credentials = "user=limedbadministrator password=1Cisco2";

  $db = pg_connect( "$host $port $dbname $credentials"  ) or die('fail');
//  if(!$db){
//     echo "Error : Unable to open database\n";
//  } else {
//     echo "Opened database successfully\n";
//  	}

   $surveyID_in_bdd = 'select * from  surveys_languagesettings';

   $result_surveyID = pg_query($db,$surveyID_in_bdd);
   
   


   while($r1 = pg_fetch_row($result_surveyID)){ 

		//print $r1[0] ."<br>";
		$db_table = "tokens_".$r1[0];
		//echo  $db_table."<br>";

		$password_in_bdd = "select token from $db_table where  token = '$password'";
		$result_password = pg_query($db,$password_in_bdd);

		while ($r2 = pg_fetch_row($result_password)){
		//print  $r2[0] ."<br>";
?>


</tr>  
</div>
	<tr>
	<td><?php echo '<div align="center"><h3>'.$r1[2].'</h3></div>';?></td>
	<td>
	<?php 
	$site = "https://s4proj15.ddns.net/index.php/".$r1[0]."?lang=".$r1[1];
	echo '<div align="center"><h3>'.$site.'</h3></div>';
		
	?>		
	</td>

	</tr>
</table>

	<?php		
  			}

  		}	

	?>  




</body>
</html>