<?php
$db_server="localhost";
$db_user="root";
$db_password="";

$conn=mysqli_connect($db_server,$db_user,$db_password);
if(!$conn){
  die("Error! Can't able to connect to the Database!".mysqli_connect_error());
}else{
  echo "Database connected Successfully";
  echo "<br>";
}

$sql="CREATE DATABASE hospitalseek";

if(mysqli_query($conn,$sql)){
  echo "Database Created Successfully";
  echo "<br>";
}else{
  echo "Can't able to create Database.".mysqli_error($conn);
}
mysqli_close($conn);

?>