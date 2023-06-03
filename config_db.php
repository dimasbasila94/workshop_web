<?php
$host = "localhost";
$username = "workshop";
$password = "2023Workshop!";
$database = "workshop_web";
// Create connection
$conn = new mysqli($host, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //echo "success connected";
}


//read data table
$sql = "SELECT * FROM tb_content";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    print_r($row['id'].",".$row['content'].",".$row['date_create']);
    print_r("<br>");
  }
} else {
  echo "0 results";
}


$conn->close();
?>
