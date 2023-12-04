<!DOCTYPE html>
<html>
<head>
    <title>Appointment Details</title>
</head>
<body>
    <h1>Appointment Details</h1>
    <p><strong>Hospital Name:</strong> <?= $hospitalName ?></p>
    <p><strong>Hospital Address:</strong> <?= $hospitalAddress ?></p>
    <p><strong>Name:</strong> <?= $userData['first_name'] . ' ' . $userData['last_name'] ?></p>
    <p><strong>Email:</strong> <?= $userData['email'] ?></p>
    <p><strong>Date of Birth:</strong> <?= $userData['dob'] ?></p>
    <p><strong>Gender:</strong> <?= $userData['gender'] ?></p>
    <p><strong>Mobile:</strong> <?= $userData['mobile'] ?></p>
    <p><strong>Patient Name:</strong> <?= isset($_POST['patientName']) ? $_POST['patientName'] : '' ?></p>
    <p><strong>Appointment Date:</strong> <?= isset($_POST['appointmentDate']) ? $_POST['appointmentDate'] : '' ?></p>
</body>
</html>
