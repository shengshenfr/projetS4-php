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




<br><br>


<?php 

try
{

	$password = $_POST['password'];

  	$host        = "host=212.237.28.119";
  	$port        = "port=5432";
  	$dbname      = "dbname=limedb";
  	$credentials = "user=limedbadministrator password=1Cisco2";

	$bdd = new PDO('pgsql:host=212.237.28.119; port = 5432; dbname= limedb;', 'limedbadministrator', '1Cisco2');
	$surveyID_in_bdd = 'select * from  surveys_languagesettings';


	$result_surveyID=$bdd->prepare($surveyID_in_bdd );     
	$result_surveyID->execute();                
	$res_surveyID = $result_surveyID->fetchAll();
  
	//echo $res_surveyID[1]['surveyls_survey_id'];
	for($i=0;$i<count($res_surveyID);$i++){  

		//print $r1[0] ."<br>";
		$db_table = "tokens_".$res_surveyID[$i]['surveyls_survey_id'];
		//echo  $db_table."<br>";


	    $query_password="select token from $db_table where  token = '$password'"; 
	    $result_password=$bdd->prepare($query_password);     
	    $result_password->execute();                
	    $res_password=$result_password->fetchAll();

 
		//print  $r2[0] ."<br>";
		//echo $res_surveyID[$i]['surveyls_survey_id']."<br>";
		if($res_password){
			//echo $res_password[0]['token']."<br>";
?>	


	<table width="1000" border="1">
	<tr>

	<br>
	<th><h1>service</h1></th>
	<th><h1>site</h1></th>
 

	</tr>  
	</div>
	<tr>
	<td><?php echo '<div align="center"><h3>'.$res_surveyID[$i]['surveyls_title'].'</h3></div>';?></td>
	<td>
	<?php 
	$site = "https://s4proj15.ddns.net/index.php/".$res_surveyID[$i]['surveyls_survey_id']."?lang=".$res_surveyID[$i]['surveyls_language'];
	echo '<div align="center"><h3>'.$site.'</h3></div>';
		
	?>		
	</td>

	</tr>
</table>
<?php			
			}
		}
	}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>