<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
              <a class="nav-link" href="#"><strong>Services</strong></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <strong>About</strong>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"><strong>Our Team</strong></a></li>
                <li><a class="dropdown-item" href="#"><strong>History</strong></a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#"><strong>Contact Us</strong></a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><strong>Signup</strong></a>
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
  <section class="h-100 bg-white">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="images/688e6af8-5a30-48b9-8561-9a73bc9371d0.png" alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Registration Form</h3>
                  <form action="insertsignup.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="fname">First Name:</label>
                      <input type="text" id="fname" name="fname" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="lname">Last Name:</label>
                      <input type="text" id="lname" name="lname" class="form-control" required autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" class="form-control" required autocomplete="off">
                    </div>


                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="dob">Date of Birth:</label>
                      <input type="date" id="dob" name="dob" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Gender:</label>
                      <div class="form-check">
                        <input type="radio" id="male" name="gender" value="Male" class="form-check-input" required>
                        <label class="form-check-label" for="male">Male</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" id="female" name="gender" value="Female" class="form-check-input" required>
                        <label class="form-check-label" for="female">Female</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="mobile">Mobile Number:</label>
                      <input type="text" id="mobile" name="mobile" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="profile_picture" style="font-weight: bold; color: #333;">Profile Picture:</label>
                      <div style="display: flex; align-items: center;">
                        <input type="file" name="profile_picture" id="profile_picture" style="display: none;"
                          onchange="updateFileName()">
                        <label for="profile_picture"
                          style="cursor: pointer; margin-left: 10px; padding: 8px 12px; background-color: #007bff; color: #fff; border-radius: 5px;">
                          <i class="fas fa-upload"></i> Choose File
                        </label>
                        <span id="file-name" style="margin-left: 10px;"></span>
                      </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="signup.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>