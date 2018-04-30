<!DOCTYPE html>
<html>
<head>
  <title>Enter your Document</title>
</head>
<body>
<h1>Online Cache</h1>

<a href="receiveDoc.php">Receive a Document</a>

<a href="clearCache.php">Clear Cache</a>


  <form id="form" method="POST">
    <p><strong>Enter Document</strong></p>
    <label>ID</label><input type="text" name="ID"></input><br />
	<label>Message</label><input type="text" name="Message"></input><br />
    <input type="submit" value="Enter"></input>
  </form>
</body>
</html>


<?php $servername = "localhost";
$username ="root";
$password = "";
$dbname = "test";

//connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}echo "Connecec successfuly";
	//$toSub = new DateInterval('PT30S');
	//$date->sub($toSub);
$delete = "DELETE FROM document WHERE ttl <  (now() - interval 30 second)";
	if ($conn->query($delete) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
	if(!empty($_POST['ID']))
{
$time = date("Y-m-d H:i:s");
$sql = "INSERT INTO document (ID, Message, ttl) VALUES ( ". $_POST['ID'] . ", '" . $_POST['Message']. "','" . $time . "')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 }
	else{
	echo "TESING";
}

//$conn->close();
?>