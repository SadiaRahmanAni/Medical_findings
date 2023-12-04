<?php
session_start();

require('fpdf/fpdf.php');

// Create a new PDF instance
class PDF extends FPDF {
    function Header()
    {
        // Header content goes here
        // For example, you can add a header text or logo here
        $this->SetFont('Times', 'B', 12);
        $this->Cell(0, 10, 'Hospital Report', 0, 1, 'C');
    }

    function Footer()
    {
        // Footer content goes here
        // For example, you can add page number and date here
        $this->SetY(-15);
        $this->SetFont('Times', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
        $this->Cell(0, 10, 'Generated on ' . date('Y-m-d H:i:s'), 0, 0, 'R');
    }
}

// Database configuration
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hospitalseek";

// Create a new PDF instance
$pdf = new PDF();
$pdf->AddPage();

// Set font to Times New Roman
$pdf->SetFont('Times', '', 12);

// Database connection
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    die("ERROR! Can't connect to the server. " . mysqli_connect_error());
}

$loggedInUserEmail = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$selectedHospitalId = isset($_POST['hospitalId']) ? $_POST['hospitalId'] : null;


$sqlHospital = "SELECT name, address FROM medical_institutions WHERE id=?";
$stmtHospital = mysqli_prepare($conn, $sqlHospital);
mysqli_stmt_bind_param($stmtHospital, "i", $selectedHospitalId);
mysqli_stmt_execute($stmtHospital);

if (!$stmtHospital) {
    die("Error in SQL query (Hospital): " . mysqli_error($conn));
}

$resultHospital = mysqli_stmt_get_result($stmtHospital);
$hospitalData = mysqli_fetch_assoc($resultHospital);


$userData = [];

if ($loggedInUserEmail) {
    $sqlUserData = "SELECT * FROM signup WHERE email=?";
    $stmtUserData = mysqli_prepare($conn, $sqlUserData);
    mysqli_stmt_bind_param($stmtUserData, "s", $loggedInUserEmail);
    mysqli_stmt_execute($stmtUserData);
    $resultUserData = mysqli_stmt_get_result($stmtUserData);
    $userData = mysqli_fetch_assoc($resultUserData);
}

mysqli_close($conn); 

$pdf->Cell(0, 10, 'Hospital ID: ' . $selectedHospitalId, 0, 1);

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 10, 'Hospital Details', 0, 1);

$pdf->Cell(0, 10, 'Hospital Name: ' . (isset($hospitalData['name']) ? $hospitalData['name'] : 'Unknown Hospital'), 0, 1);
$pdf->Cell(0, 10, 'Hospital Address: ' . (isset($hospitalData['address']) ? $hospitalData['address'] : 'Unknown Address'), 0, 1);

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 10, 'User Details', 0, 1);

$pdf->Cell(0, 10, 'Name: ' . (isset($userData['first_name']) ? $userData['first_name'] . ' ' . $userData['last_name'] : 'Unknown Name'), 0, 1);
$pdf->Cell(0, 10, 'Email: ' . (isset($userData['email']) ? $userData['email'] : 'Unknown Email'), 0, 1);
$pdf->Cell(0, 10, 'Date of Birth: ' . (isset($userData['dob']) ? $userData['dob'] : 'Unknown DOB'), 0, 1);
$pdf->Cell(0, 10, 'Gender: ' . (isset($userData['gender']) ? $userData['gender'] : 'Unknown Gender'), 0, 1);
$pdf->Cell(0, 10, 'Mobile: ' . (isset($userData['mobile']) ? $userData['mobile'] : 'Unknown Mobile'), 0, 1);

$pdf->Output();
?>
