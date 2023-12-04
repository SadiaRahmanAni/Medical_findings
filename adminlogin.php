<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hospitalseek";

$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Error! Can't able to connect to the Database!" . mysqli_connect_error());
}

$table = "admin";

if (isset($_GET['table'])) {
    $table = $_GET['table'];
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
      
        if (password_verify($password, $row['password'])) {
         
            header("Location: admin_dashboard.php");
            exit();
        } else {
       
            $login_error = "Invalid email or password.";
        }
    } else {
     
        $login_error = "Invalid email or password.";
    }

    mysqli_stmt_close($stmt);
}
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
            background-color: #f0f0f0; 
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            width: 100%;
        }

        .btn-login {
            background-color: #007bff; 
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: #0056b3; 
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body class="p-3 m-0 border-0 bd-example">

  <nav class="navbar navbar-light bg-cyan-800 fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i>HospitalSeek</i></a>
     
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header d-flex flex-column align-items-center">
          <div class="logo">
            <img src="images/hsone.png" alt="HospitalSeek Logo" height="150px" width="150px" style="border-radius: 50%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); margin-bottom: 10px;">
          </div>
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">HospitalSeek</h5>
            <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
           
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log In</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="adminlogin.php">Admin Log In</a>
            </li>
          
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-cyan-800" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </nav>

    
  <div class="container mt-5">
        <h2 class="text-center">Admin Login</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required autocomplete="off">
            </div>
            <br>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
        </form>
    <?php
    if (isset($login_error)) {
        echo "<p style='color: red;'>$login_error</p>";
    }
    ?>
</body>
</html>
<?php
mysqli_close($conn);
?>