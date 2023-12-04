<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hospitalseek";

$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$conn) {
    die("Error! Can't able to connect to the Database!" . mysqli_connect_error());
}

$specialist = $_GET['specialist'];

$query = "SELECT * FROM medical_institutions WHERE specialties LIKE ?";
$stmt = mysqli_prepare($conn, $query);
$searchTerm = '%' . $specialist . '%';
mysqli_stmt_bind_param($stmt, "s", $searchTerm);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$resultsArray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $resultsArray[] = $row;
}

mysqli_close($conn);

echo json_encode($resultsArray);
?>
