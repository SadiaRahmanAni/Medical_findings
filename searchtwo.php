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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="home.css">
  <title>HospitalSeek</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Times New Roman', serif;
    }

    .container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
      /* Adjust this margin as needed */
    }

    .form-group {
      margin-bottom: 20px;
    }

    #searchButton {
      background-color: #007bff;
      border-color: #007bff;
    }

    #searchButton:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .dropdown-toggle {
      background-color: #6c757d;
      border-color: #6c757d;
    }

    .dropdown-toggle:hover {
      background-color: #5a6268;
      border-color: #545b62;
    }

    .search-results {
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid #e9ecef;
    }

    .result-item {
      display: flex;
      align-items: center;
      padding: 15px;
      border-bottom: 1px solid #e9ecef;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .result-item:hover {
      background-color: #f8f9fa;
    }

    .result-image {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
      margin-right: 20px;
    }

    .result-details h4 {
      margin: 0;
      font-size: 20px;
    }

    .result-details p {
      margin: 5px 0;
    }

    .appointment-button {
      background-color: #007bff;
      border-color: #007bff;
      color: #fff;
      transition: background-color 0.2s;
    }

    .appointment-button:hover {
      background-color: #0056b3;
      border-color: #0056b3;
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
  <div class="container">
    <h1>Search Medical Institutions by Specialist</h1>
    <form id="searchForm">
      <div class="form-group">
        <label for="specialist">Enter Specialist Name:</label>
        <input type="text" id="specialist" name="specialist" class="form-control">
      </div>
      <button type="button" id="searchButton" class="btn btn-primary">Search</button>
    </form>
    <div class="dropdown mt-2">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="suggestionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Suggestions
      </button>
      <div class="dropdown-menu" aria-labelledby="suggestionDropdown" id="suggestionList">
      </div>
    </div>
    <div id="searchResults" class="search-results"></div>
  </div>
  <script src="search.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fuse.js/6.4.6/fuse.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>