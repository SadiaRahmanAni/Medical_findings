<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hospitalseek";

$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$conn) {
  die("Error! Can't able to connect to the Database!" . mysqli_connect_error());
} else {
  echo "Database connected Successfully";
  echo "<br>";
}
$sqlCreateTable = "CREATE TABLE medical_institutions (
  id INT PRIMARY KEY,
  name VARCHAR(100),
  address VARCHAR(200),
  specialties VARCHAR(500),
  image_url VARCHAR(200)
)";


if (mysqli_query($conn, $sqlCreateTable)) {
  echo "Table created successfully.<br>";
} else {
  echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);
?>