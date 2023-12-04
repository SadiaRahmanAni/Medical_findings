<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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


$email = "sadia@gmail.com";
$first_name = "Sadia";
$last_name = "Rahman";
$password = password_hash("123456Rj", PASSWORD_DEFAULT);
$dob = "2023-09-25";
$gender = "Female";
$mobile = "01711946992";
$profile_picture = "uploads/ani_image.jpg";

$sql = "INSERT INTO admin (email, first_name, last_name, password, dob, gender, mobile, profile_picture) 
        VALUES ('$email', '$first_name', '$last_name', '$password', '$dob', '$gender', '$mobile', '$profile_picture')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted into the table successfully";
    echo "<br>";
} else {
    echo "Can't able to insert data into the table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
