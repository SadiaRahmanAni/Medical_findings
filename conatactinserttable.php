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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namePattern = '/^(?!.*\s{2})[a-zA-Z\s]{4,20}$/';
    $emailPattern = '/^\S+@\S+\.\S+$/';
    $messagePattern = '/^.{1,1000}$/';

    echo "Form submitted.";
    echo "<br>";

    $name = $_POST["name"] ;
    $email = $_POST["email"] ;
    $message = $_POST["message"] ;

   
    $errors = [];

    if (empty($name)) {
        $errors['name'] = 'Name is required';
    } elseif (!preg_match($namePattern, $name)) {
        $errors['name'] = 'Name should have a first name and last name. Middle name is optional.';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!preg_match($emailPattern, $email)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($message)) {
        $errors['message'] = 'Message is required';
    } elseif (str_word_count($message) > 1000 || !preg_match($messagePattern, $message)) {
        $errors['message'] = 'Message should not contain more than 1000 characters and must contain only alphanumeric characters.';
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='error'>$error</div>";
        }
    } else {
        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo " successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

mysqli_close($conn);
?>