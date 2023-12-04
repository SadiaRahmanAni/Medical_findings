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
$action = isset($_GET['action']) ? $_GET['action'] : '';

if (isset($_GET['table'])) {
    $table = $_GET['table'];
}

if ($action === 'create') {
    // Handle form submission for creating new records
    if ($table === 'contact') {
        if (isset($_POST['create'])) {
            // Handle creating a new contact record
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);
            
            $insertSql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
            $insertResult = mysqli_query($conn, $insertSql);
            
            if (!$insertResult) {
                die("Error creating contact: " . mysqli_error($conn));
            }
        }
    } elseif ($table === 'medical_institutions') {
        if (isset($_POST['create'])) {
            // Handle creating a new medical institution record
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $specialties = mysqli_real_escape_string($conn, $_POST['specialties']);
            $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
            
            $insertSql = "INSERT INTO medical_institutions (name, address, specialties, image_url) VALUES ('$name', '$address', '$specialties', '$image_url')";
            $insertResult = mysqli_query($conn, $insertSql);
            
            if (!$insertResult) {
                die("Error creating medical institution: " . mysqli_error($conn));
            }
        }
    } elseif ($table === 'signup') {
        if (isset($_POST['create'])) {
            // Handle creating a new signup record
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $dob = mysqli_real_escape_string($conn, $_POST['dob']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $profile_picture = mysqli_real_escape_string($conn, $_POST['profile_picture']);
            
            $insertSql = "INSERT INTO signup (email, first_name, last_name, password, dob, gender, mobile, profile_picture) VALUES ('$email', '$first_name', '$last_name', '$password', '$dob', '$gender', '$mobile', '$profile_picture')";
            $insertResult = mysqli_query($conn, $insertSql);
            
            if (!$insertResult) {
                die("Error creating signup record: " . mysqli_error($conn));
            }
        }
    }
}

if ($action === 'update') {
    // Handle updating a record
    if ($table === 'contact' && isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        if (isset($_POST['update'])) {
            // Handle updating the contact record
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);
            
            $updateSql = "UPDATE contact SET name='$name', email='$email', message='$message' WHERE id='$id'";
            $updateResult = mysqli_query($conn, $updateSql);
            
            if (!$updateResult) {
                die("Error updating contact: " . mysqli_error($conn));
            }
        }
    } elseif ($table === 'medical_institutions' && isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        if (isset($_POST['update'])) {
            // Handle updating the medical institution record
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $specialties = mysqli_real_escape_string($conn, $_POST['specialties']);
            $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
            
            $updateSql = "UPDATE medical_institutions SET name='$name', address='$address', specialties='$specialties', image_url='$image_url' WHERE id='$id'";
            $updateResult = mysqli_query($conn, $updateSql);
            
            if (!$updateResult) {
                die("Error updating medical institution: " . mysqli_error($conn));
            }
        }
    } elseif ($table === 'signup' && isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        if (isset($_POST['update'])) {
            // Handle updating the signup record
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $dob = mysqli_real_escape_string($conn, $_POST['dob']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $profile_picture = mysqli_real_escape_string($conn, $_POST['profile_picture']);
            
            $updateSql = "UPDATE signup SET email='$email', first_name='$first_name', last_name='$last_name', password='$password', dob='$dob', gender='$gender', mobile='$mobile', profile_picture='$profile_picture' WHERE id='$id'";
            $updateResult = mysqli_query($conn, $updateSql);
            
            if (!$updateResult) {
                die("Error updating signup record: " . mysqli_error($conn));
            }
        }
    }
}

if ($action === 'delete') {
    // Handle deleting a record
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        if ($table === 'contact') {
            // Handle deleting a contact record
            $deleteSql = "DELETE FROM contact WHERE id='$id'";
            $deleteResult = mysqli_query($conn, $deleteSql);
            
            if (!$deleteResult) {
                die("Error deleting contact: " . mysqli_error($conn));
            }
        } elseif ($table === 'medical_institutions') {
            // Handle deleting a medical institution record
            $deleteSql = "DELETE FROM medical_institutions WHERE id='$id'";
            $deleteResult = mysqli_query($conn, $deleteSql);
            
            if (!$deleteResult) {
                die("Error deleting medical institution: " . mysqli_error($conn));
            }
        } elseif ($table === 'signup') {
            // Handle deleting a signup record
            $deleteSql = "DELETE FROM signup WHERE id='$id'";
            $deleteResult = mysqli_query($conn, $deleteSql);
            
            if (!$deleteResult) {
                die("Error deleting signup record: " . mysqli_error($conn));
            }
        }
    }
}

$tableColumns = [
    'admin' => ['id', 'first_name', 'last_name', 'email', 'dob', 'gender', 'mobile', 'profile_picture'],
    'contact' => ['id', 'name', 'email', 'message'],
    'medical_institutions' => ['id', 'name', 'address', 'specialties', 'image_url'],
    'signup' => ['id', 'email', 'first_name', 'last_name', 'password', 'dob', 'gender', 'mobile', 'profile_picture'],
];

if (!array_key_exists($table, $tableColumns)) {
    $table = "admin";
}

$sql = "SELECT * FROM $table";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
            margin-top: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .admin-card {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .profile-picture {
            max-width: 150px;
            display: block;
            margin: 0 auto;
            border-radius: 50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-right">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <h1>Admin Dashboard</h1>

        <div class="text-center mb-4">
            <a href="?table=admin" class="btn btn-primary">Admin</a>
            <a href="?table=contact" class="btn btn-primary">Contact</a>
            <a href="?table=medical_institutions" class="btn btn-primary">Medical Institutions</a>
            <a href="?table=signup" class="btn btn-primary">Sign Up</a>
        </div>

        <?php
        // Show the Create Form
        if ($action === 'create' && ($table === 'contact' || $table === 'medical_institutions' || $table === 'signup')) {
            echo '<div class="row">';
            echo '<div class="col-md-6 mx-auto">';
            echo '<form method="post">';
            if ($table === 'contact') {
                echo '<div class="form-group">';
                echo '<label for="name">Name</label>';
                echo '<input type="text" class="form-control" id="name" name="name" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="email">Email</label>';
                echo '<input type="email" class="form-control" id="email" name="email" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="message">Message</label>';
                echo '<textarea class="form-control" id="message" name="message" rows="4" required></textarea>';
                echo '</div>';
            } elseif ($table === 'medical_institutions') {
                echo '<div class="form-group">';
                echo '<label for="name">Name</label>';
                echo '<input type="text" class="form-control" id="name" name="name" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="address">Address</label>';
                echo '<input type="text" class="form-control" id="address" name="address" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="specialties">Specialties</label>';
                echo '<input type="text" class="form-control" id="specialties" name="specialties" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="image_url">Image URL</label>';
                echo '<input type="text" class="form-control" id="image_url" name="image_url" required>';
                echo '</div>';
            } elseif ($table === 'signup') {
                echo '<div class="form-group">';
                echo '<label for="email">Email</label>';
                echo '<input type="email" class="form-control" id="email" name="email" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="first_name">First Name</label>';
                echo '<input type="text" class="form-control" id="first_name" name="first_name" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="last_name">Last Name</label>';
                echo '<input type="text" class="form-control" id="last_name" name="last_name" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="password">Password</label>';
                echo '<input type="password" class="form-control" id="password" name="password" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="dob">Date of Birth</label>';
                echo '<input type="date" class="form-control" id="dob" name="dob" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="gender">Gender</label>';
                echo '<select class="form-control" id="gender" name="gender" required>';
                echo '<option value="Male">Male</option>';
                echo '<option value="Female">Female</option>';
                echo '<option value="Other">Other</option>';
                echo '</select>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="mobile">Mobile</label>';
                echo '<input type="text" class="form-control" id="mobile" name="mobile" required>';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="profile_picture">Profile Picture URL</label>';
                echo '<input type="text" class="form-control" id="profile_picture" name="profile_picture">';
                echo '</div>';
            }
            echo '<button type="submit" class="btn btn-success" name="create">Create</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }

        // Show the Update Form
        if ($action === 'update' && ($table === 'contact' || $table === 'medical_institutions' || $table === 'signup') && isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $updateRecordSql = "SELECT * FROM $table WHERE id='$id'";
            $updateRecordResult = mysqli_query($conn, $updateRecordSql);
            $updateRecord = mysqli_fetch_assoc($updateRecordResult);

            if ($updateRecord) {
                echo '<div class="row">';
                echo '<div class="col-md-6 mx-auto">';
                echo '<form method="post">';
                if ($table === 'contact') {
                    echo '<div class="form-group">';
                    echo '<label for="name">Name</label>';
                    echo '<input type="text" class="form-control" id="name" name="name" value="' . $updateRecord['name'] . '" required>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="email">Email</label>';
                    echo '<input type="email" class="form-control" id="email" name="email" value="' . $updateRecord['email'] . '" required>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="message">Message</label>';
                    echo '<textarea class="form-control" id="message" name="message" rows="4" required>' . $updateRecord['message'] . '</textarea>';
                    echo '</div>';
                } elseif ($table === 'medical_institutions') {
                    echo '<div class="form-group">';
                    echo '<label for="name">Name</label>';
                    echo '<input type="text" class="form-control" id="name" name="name" value="' . $updateRecord['name'] . '" required>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="address">Address</label>';
                    echo '<input type="text" class="form-control" id="address" name="address" value="' . $updateRecord['address'] . '" required>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="specialties">Specialties</label>';
                    echo '<input type="text" class="form-control" id="specialties" name="specialties" value="' . $updateRecord['specialties'] . '" required>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="image_url">Image URL</label>';
                    echo '<input type="text" class="form-control" id="image_url" name="image_url" value="' . $updateRecord['image_url'] . '" required>';
                    echo '</div>';
                } elseif ($table === 'signup') {
                    echo '<div class="form-group">';
echo '<label for="email">Email</label>';
echo '<input type="email" class="form-control" id="email" name="email" value="' . htmlspecialchars($updateRecord['email']) . '" required>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="first_name">First Name</label>';
echo '<input type="text" class="form-control" id="first_name" name="first_name" value="' . htmlspecialchars($updateRecord['first_name']) . '" required>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="last_name">Last Name</label>';
echo '<input type="text" class="form-control" id="last_name" name="last_name" value="' . htmlspecialchars($updateRecord['last_name']) . '" required>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="password">Password</label>';
echo '<input type="password" class="form-control" id="password" name="password" value="' . htmlspecialchars($updateRecord['password']) . '" required>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="dob">Date of Birth</label>';
echo '<input type="date" class="form-control" id="dob" name="dob" value="' . htmlspecialchars($updateRecord['dob']) . '" required>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="gender">Gender</label>';
echo '<select class="form-control" id="gender" name="gender" required>';
echo '<option value="Male"' . ($updateRecord['gender'] === 'Male' ? ' selected' : '') . '>Male</option>';
echo '<option value="Female"' . ($updateRecord['gender'] === 'Female' ? ' selected' : '') . '>Female</option>';
echo '<option value="Other"' . ($updateRecord['gender'] === 'Other' ? ' selected' : '') . '>Other</option>';
echo '</select>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="mobile">Mobile</label>';
echo '<input type="text" class="form-control" id="mobile" name="mobile" value="' . htmlspecialchars($updateRecord['mobile']) . '" required>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="profile_picture">Profile Picture URL</label>';
echo '<input type="text" class="form-control" id="profile_picture" name="profile_picture" value="' . htmlspecialchars($updateRecord['profile_picture']) . '">';
echo '</div>';
                }
                echo '<button type="submit" class="btn btn-primary" name="update">Update</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        }

        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-4">';
            echo '<div class="admin-card">';
            if ($table == 'admin') {
                echo '<img src="' . $row['profile_picture'] . '" alt="Profile Picture" class="profile-picture">';
                echo '<h5 class="text-center">' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
                echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
                echo '<p><strong>Date of Birth:</strong> ' . $row['dob'] . '</p>';
                echo '<p><strong>Gender:</strong> ' . $row['gender'] . '</p>';
                echo '<p><strong>Mobile:</strong> ' . $row['mobile'] . '</p>';
            } elseif ($table == 'contact') {
                echo '<h5 class="text-center">' . $row['name'] . '</h5>';
                echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
                echo '<p><strong>Message:</strong> ' . $row['message'] . '</p>';
            } elseif ($table == 'medical_institutions') {
                echo '<h5 class="text-center">' . $row['name'] . '</h5>';
                echo '<p><strong>Address:</strong> ' . $row['address'] . '</p>';
                echo '<p><strong>Specialties:</strong> ' . $row['specialties'] . '</p>';
                echo '<img src="' . $row['image_url'] . '" alt="Medical Image" class="profile-picture">';
            } elseif ($table == 'signup') {
                echo '<h5 class="text-center">' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
                echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
                echo '<p><strong>Password:</strong> ' . $row['password'] . '</p>';
                if (!empty($row['profile_picture'])) {
                    echo '<img src="' . $row['profile_picture'] . '" alt="Profile Picture" class="profile-picture">';
                }
            }
            
            echo '<div class="text-center">';
            echo '<a href="?action=update&table=' . $table . '&id=' . $row['id'] . '" class="btn btn-primary btn-action">Update</a>';
            echo '<a href="?action=delete&table=' . $table . '&id=' . $row['id'] . '" class="btn btn-danger btn-action">Delete</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        ?>
    </div>
</body>
</html>
