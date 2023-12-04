<?php

    echo "REACHED HERE ";

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hospitalseek";
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
    die("ERROR! Can't able to connect to the Server. " . mysqli_connect_error());
} else {
    echo "Connected Successfully. <br><br>";
}

function authenticateUser($conn, $email, $password)
{
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT email, password FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $plainPassword = $row['password'];

        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        if (password_verify($password, $hashedPassword)) {
            echo "Debug: Password verification successful. Hashes match.<br>";
            return true;
        } else {
            echo "Debug: Password verification failed. Hashes do not match.<br>";
        }
    } else {
        echo "Debug: User not found.<br>";
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "Debug: Attempting authentication for email: $email<br>";

    if (authenticateUser($conn, $email, $password)) {
        echo "Authentication successful. You are logged in.";
            
        session_start();
        $_SESSION['email'] = $email ;  
        header("Location: user_profile.php");

        exit();
    } else {
        echo "Authentication failed. Incorrect email or password.";
    }

    mysqli_close($conn);
}
?>
