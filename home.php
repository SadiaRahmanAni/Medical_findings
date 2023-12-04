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
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
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

  <div class="carousel-container">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="images/hospital002.jpg" class="d-block w-100" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5><b>"HospitalSeek: Navigating Care, Discovering Health. Your journey to wellness begins here."</b></h5>

          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="images/hospital-building-001-global.jpg" class="d-block w-100" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5><b>"In the realm of healthcare exploration, HospitalSeek shines as a guiding light, connecting you to quality care and medical excellence."</b></h5>

          </div>
        </div>
        <div class="carousel-item">
          <img src="images/depositphotos_137808390-stock-photo-big-build-hospital.jpg" class="d-block w-100" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5><b>"Empowering your health choices, HospitalSeek stands as a beacon, leading you to compassionate care and a healthier tomorrow."</b></h5>

          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container mt-5">
    <h2>Our Services</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/pexels-pixabay-263402.jpg" alt="Service 1" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Emergency Care</h5>
            <p class="card-text">We provide 24/7 emergency medical care with experienced doctors and advanced facilities.</p>
            <a href="#" class="btn btn-outline-info">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/hs.png" alt="Service 2" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Specialized Treatments</h5>
            <p class="card-text">Our hospitals offer a wide range of specialized treatments and medical services.</p>
            <a href="#" class="btn btn-outline-info">Read More</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/wp.png" alt="Service 3" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">Wellness Programs</h5>
            <p class="card-text">Explore our wellness programs designed to promote overall health and well-being.</p>
            <a href="#" class="btn btn-outline-info">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <section class="container mt-5">
  <h2>Contact Us</h2>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="conatactinserttable.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="info" class="form-label">Message:</label>
                    <textarea class="form-control" id="info" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <br>
                <br>
            </form>
        </div>
    </div>
  </section>


  <footer class="bg-cyan-800 text-center text-white py-3">
    <p>&copy; Sadia Rahman Ani. All rights reserved.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>