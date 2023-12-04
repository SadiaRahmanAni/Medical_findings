<?php
session_start();

function getProfilePicturePathFromDatabase($userEmail)
{
  global $conn;

  $sql = "SELECT profile_picture FROM signup WHERE email=?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $userEmail);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $profilePicturePath);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);

  return $profilePicturePath;
}

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hospitalseek";
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
  die("ERROR! Can't able to connect to the Server. " . mysqli_connect_error());
}

$loggedInUserEmail = $_SESSION['email'];
$profilePicturePath = getProfilePicturePathFromDatabase($loggedInUserEmail);

$sql = "SELECT * FROM signup WHERE email=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $loggedInUserEmail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$userData = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
use Dompdf\Dompdf;
use Dompdf\Options;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="makeappointment.css">
  <title>HospitalSeek</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


  <!-- Suny added this library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


  <style>
   body {
  background-color: #f7fafc;
  font-family: 'Times New Roman', serif;
}
  </style>
</head>


<body>
  <nav class="navbar navbar-light bg-cyan-800 fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i>HospitalSeek</i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header d-flex flex-column align-items-center">
          <div class="logo">
            <?php if ($profilePicturePath) { ?>
              <img src="<?php echo $profilePicturePath; ?>" alt="Profile Picture" height="150px" width="150px" style="border-radius: 50%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); margin-bottom: 10px;">
            <?php } else { ?>
              <img src="default_profile_picture.jpg" alt="Default Profile Picture" height="150px" width="150px" style="border-radius: 50%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); margin-bottom: 10px;">
            <?php } ?>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="searchone.php">Search For Medicals</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  About
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Our Team</a></li>
                  <li><a class="dropdown-item" href="#">History</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Contact Us</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex mt-3" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-cyan-800" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-4">Make an Appointment</h1>

    <?php

    if (isset($_GET['hospitalId'])) {
      $selectedHospitalId = $_GET['hospitalId'];

      $sqlHospital = "SELECT name, address FROM medical_institutions WHERE id=?";
      $stmtHospital = mysqli_prepare($conn, $sqlHospital);
      mysqli_stmt_bind_param($stmtHospital, "i", $selectedHospitalId);
      mysqli_stmt_execute($stmtHospital);
      $resultHospital = mysqli_stmt_get_result($stmtHospital);
      $hospitalData = mysqli_fetch_assoc($resultHospital);
      mysqli_stmt_close($stmtHospital);

      if ($hospitalData) {
        $hospitalName = $hospitalData['name'];
        $hospitalAddress = $hospitalData['address'];
      } else {
        $hospitalName = "Unknown Hospital";
        $hospitalAddress = "Unknown Address";
      }

      if ($userData) {
    ?>

        <div class="bg-white p-6 rounded shadow">
          <h2 class="text-lg font-semibold mb-2">Hospital Details</h2>
          <p class="mb-4"><strong>Hospital Name:</strong> <?= $hospitalName ?></p>
          <p class="mb-4"><strong>Hospital Address:</strong> <?= $hospitalAddress ?></p>
          <p><strong>Name:</strong> <?= $userData['first_name'] . ' ' . $userData['last_name'] ?></p>
          <p><strong>Email:</strong> <?= $userData['email'] ?></p>
          <p><strong>Date of Birth:</strong> <?= $userData['dob'] ?></p>
          <p><strong>Gender:</strong> <?= $userData['gender'] ?></p>
          <p><strong>Mobile:</strong> <?= $userData['mobile'] ?></p>

          <form method="post" action="process_appointment.php">
            <input type="hidden" name="hospitalId" value="<?= $selectedHospitalId ?>">
            <div class="mb-4">
              <label class="block font-medium">Your Name:</label>
              <input type="text" name="patientName" value="<?= isset($userData['first_name']) ? $userData['first_name'] . ' ' . $userData['last_name'] : '' ?>" class="w-full rounded border py-2 px-3">
            </div>
            <div class="mb-4">
              <label class="block font-medium">Appointment Date:</label>
              <input type="date" name="appointmentDate" class="w-full rounded border py-2 px-3">
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600">Submit Appointment</button>
          </form>
          




          </div>
        <?php
      } else {
        echo "<p class='text-red-600'>Invalid hospital ID.</p>";
      }
    }
  
    ?>
  </div>


</body>
</html>