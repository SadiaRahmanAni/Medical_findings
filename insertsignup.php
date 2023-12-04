<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
  $namePattern = '/^(?!.*\s{2})[a-zA-Z\s]{4,20}$/';
  $emailPattern = '/^\S+@\S+\.\S+$/';
  $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,25}$/';
  $dobPattern = '/^\d{4}-\d{2}-\d{2}$/';
  $mobilePattern = '/^01[3-9]\d{8}$/';
  echo "<pre>";
  print_r($_FILES['profile_picture']);
  echo "</pre>";

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $mobile = $_POST['mobile'];

  $errors = array();

  if (empty($fname) || empty($lname)) {
    $errors['name'] = 'First Name and Last Name are required';
  } elseif (!preg_match($namePattern, "$fname $lname")) {
    $errors['name'] = 'Name should have a first name and last name. Middle name is optional.';
  }

  if (empty($email)) {
    $errors['email'] = 'Email is required.';
  } elseif (!preg_match($emailPattern, $email)) {
    $errors['email'] = 'Invalid email Address.';
  }

  if (empty($password)) {
    $errors['password'] = 'Password is required.';
  } elseif (!preg_match($passwordPattern, $password)) {
    $errors['password'] = 'Password must contain at least one lowercase letter, one uppercase letter, one digit, and be 7-25 characters long.';
  }

  if (empty($dob)) {
    $errors['dob'] = 'Date of Birth is required.';
  } elseif (!preg_match($dobPattern, $dob)) {
    $errors['dob'] = 'Invalid Date of Birth. Please use the format YYYY-MM-DD.';
  }

  if (empty($mobile)) {
    $errors['mobile'] = 'Mobile is required.';
  } elseif (!preg_match($mobilePattern, $mobile)) {
    $errors['mobile'] = 'Invalid mobile number.';
  }

  $profilePicturePath = null;
  if (!empty($_FILES['profile_picture']['name'])) {
      $uploadDir = 'uploads/';
      $profilePicturePath = $uploadDir . basename($_FILES['profile_picture']['name']);

      if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profilePicturePath)) {
          echo "File uploaded successfully.";
      } else {
          echo "Error uploading file: " . $_FILES['profile_picture']['error'];
      }
  } else {
      echo "No file uploaded.";
  }

  if (empty($errors)) {
    $sql = "INSERT INTO signup (first_name, last_name, email, password, dob, gender, mobile, profile_picture)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $fname, $lname, $email, $password, $dob, $gender, $mobile, $profilePicturePath);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

} else {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}


$conn->close();
}
?>
