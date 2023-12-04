<?php
$db_server="localhost";
$db_user="root";
$db_password="";
$db_name="hospitalseek";

$conn=mysqli_connect($db_server,$db_user,$db_password,$db_name);
if(!$conn){
  die("Error! Can't able to connect to the Database!".mysqli_connect_error());
}else{
  echo "Database connected Successfully";
  echo "<br>";
}

$sql = "CREATE TABLE signup (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) UNIQUE,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  password VARCHAR(500) NOT NULL,
  dob DATE NOT NULL,
  gender ENUM('Male', 'Female', 'Other') NOT NULL,
  mobile VARCHAR(15) NOT NULL,
  profile_picture VARCHAR(255)
)";

if(mysqli_query($conn,$sql)){
  echo "Table Created Successfully";
  echo "<br>";
}else{
  echo "Can't able to create table.".mysqli_error($conn);
}
mysqli_close($conn);


?>