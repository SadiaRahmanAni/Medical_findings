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

$sql="CREATE TABLE contact(
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(50) NOT NULL,
   email VARCHAR(100) NOT NULL,
   message VARCHAR(1000) NOT NULL
)";

if(mysqli_query($conn,$sql)){
  echo "Table Created Successfully";
  echo "<br>";
}else{
  echo "Can't able to create table.".mysqli_error($conn);
}
mysqli_close($conn);


?>