<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha384-..." crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
    <title>HospitalSeek</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>

<body class="p-3 m-0 border-0 bd-example">

  <nav class="navbar navbar-light bg-cyan-800 fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><strong>HospitalSeek</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-dark" tabindex="-1" id="offcanvasDarkNavbar"
        aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header d-flex flex-column align-items-center">
          <div class="logo">
            <img src="images/hsone.png" alt="HospitalSeek Logo" height="150px" width="150px"
              style="border-radius: 50%; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); margin-bottom: 10px;">
          </div>
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><strong>HospitalSeek</strong></h5>
            <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php"><strong>Home</strong></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="signup.php"><strong>Signup</strong></a>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row justify-content-center login-container">
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Login</h4>
          </div>
          <div class="card-body">

            <form method="POST" action="loginauth.php">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" name="password" required>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="showPasswordButton"
                      onclick="togglePassword()">Show</button>
                  </div>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="login.js"></script>
</body>

</html>