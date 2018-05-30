<?php
//read.php
require_once 'login.php';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	
$sql = "SELECT * FROM student WHERE class='" . $_POST['className'] . "'";
$result = $conn->query($sql);

$name = $row[0];
$age = $row[1];
$email = $row[2];
$fav_anime = $row[3];
$fav_genre = $row[4];
// HTML to display the form on this page.
echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
echo nl2br("<H2>Here is the roster for "." ". $_POST['className']."</H2>");
//$num_names = mysql_num_rows($roster_table);
if ($result->num_rows > 0)//will only do this if there is something to be returned from the aboe line
	{	echo"<HEAD> <link rel='stylesheet' href='survey.css'></HEAD>";
		echo "<TABLE><TR><TH>Name</TH><TH>Age</TH><TH>Email</TH></TR>";
		// Iterate through all of the returned images, placing them in a table for easy viewing
	while($row = $result->fetch_assoc())
		{
			// The following few lines store information from specific cells in the data about an image
			echo "<TR>";
			echo "<TD>".$row['name']. "</TD><TD>". $row['age']. "</TD><TD>".$row['email'] . "</TD><TD>". $row['fav_anime']. "</TD><TD>". $row['fav_genre']. "</TD>";
			echo "</TR>";
		}
	echo "</TABLE>";
	echo"<br> Need to update your information? <form action= 'update_delete.php' method = 'get'>";
	echo "<input name = 'action'   type = 'submit' value = 'Yes'>";
	echo "<input name = 'action'   type = 'submit' value = 'No'>";
	echo "</FORM>";
	}
	else{
		echo "<br> 0 results";
		}
		echo '</body>';
	
?>