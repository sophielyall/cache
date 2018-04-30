<!DOCTYPE html>
<html>
<head>
  <title>Enter your Document</title>
</head>
<body>
<h1>Online Cache</h1>

<a href="cache.php">Store a Document</a>

<a href="clearCache.php">Clear Cache</a>


  <form id="form" method="POST">
    <p><strong>Enter Document</strong></p>
    <label>ID</label><input type="text" name="ID"></input><br />
	
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
	
	$delete = "DELETE FROM document WHERE ttl <  (now() - interval 30 second)";
	if ($conn->query($delete) === TRUE) {
    echo "Record deleted";
} else {
    echo "Error deleting record: " . $conn->error;
}
if(!empty($_POST['ID']))
{
$time = date("Y-m-d H:i:s");
$sql = "SELECT * FROM document WHERE ID = " . $_POST['ID'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID"]. " - Message: " . $row["Message"]. " " . $row["ttl"]. "<br>";
    }
} else {
    echo "Resource Not found";
}}
$conn->close();
?>