<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); 
    exit();
}

$db_server = "localhost";
$db_user = "sadia"; 
$db_password = "sadia"; 
$db_name = "hospitalseek";
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    die("ERROR! Can't able to connect to the Server. " . mysqli_connect_error());
}

$email = $_SESSION['email'];


$sql = "SELECT * FROM signup WHERE email=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
} else {
    echo "Error fetching user data.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>