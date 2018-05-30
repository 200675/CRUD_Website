 <?php
 require_once '../login.php';
$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}   

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name=($_POST["name"]);
    $age=($_POST["age"]);
    $email=($_POST["email"]);
    $fav_anime=($_POST["fav_anime"]);
    $fav_genre=($_POST["fav_genre"]);
    
    
$sql=" VALUES ('POST[name]';'POST[age]';'POST[email]')";

$statement = $mysqli->prepare("INSERT INTO info(name,age,email,fav_anime,fav_genre) VALUES(?, ?, ?, ?, ?)"); //prepare sql insert query
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('sssss', $name, $age, $email, $fav_anime, $fav_genre); //bind value
		if($statement->execute())
			{
				//print output text
				echo "<H2> Thank you ".$name." for taking the survey </H2>";
			}
			else{
					print $mysqli->error; //show mysql error if any 
				}






//$output = mysql_query("SELECT * FROM info");

//while($row = mysql_fetch_array($output)) { echo $row['name'] ; echo " "; echo $row['age']; echo " "; echo $row['email'];}
}
?>
