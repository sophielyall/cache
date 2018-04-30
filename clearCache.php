<!DOCTYPE html>
<html>
<head>
  <title>Enter your Document</title>
</head>
<body>
<h1>Online Cache</h1>
<a href="cache.php">Store a Document</a>
<a href="receiveDoc.php">Receive a Document</a>


  <form id="form" method="POST">
    <p><strong>Delete Cache</strong></p>
    
	
    <input type="submit" value="Delete Cache"></input>
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

//$time = date("Y-m-d H:i:s");
$sql = "DELETE FROM document";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>