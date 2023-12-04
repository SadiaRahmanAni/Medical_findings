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

$sql = "
    INSERT INTO medical_institutions (id, name, address, specialties, image_url)
    VALUES
    (1, 'Popular Medical College Hospital', 'House # 25, 25 Road No. 2, Dhaka 1205', 'Orthopaedics Specialist, Breast Cancer Specialist, Child/Paediatrics, Physiotherapy, Neurology, Endocrine Medicine, Pediatric Surgery, Liver Biliary And Pancreatic Surgery', 'images/download.png'),

    (2, 'Uttara Adhunik Medical College (UAMC)', 'H # 34, R # 4, Sector # 9, Sonargaon Janapath, Uttara Model Town', 'Medicine, Neuromedicine, Gastroenterology, Cardiology, Nephrology, Radiation Oncology, Pediatrics, Dermatology, Psychiatry, Surgery', 'images/uamc-2018.jpg'),

    (3, 'UTTARA CRESCENT CLINIC LIMITED', 'H No. 16, Hannan Complex, Rabindra Sarani, Dhaka 1230', 'Cardiology, Nephrology, Radiation Oncology, Pediatrics, Dermatology, Psychiatry', 'images/Our Vision1579355351_Diagnostic _ Consultant Center.jpg'),

    (4, 'labaid hospital dhaka', 'House-06, Road-04, Dhanmondi, Dhaka 1205', 'General and Laparoscopic Surgeon, General Surgery, Gynecology & Obstetrics, Health Check-Up & Corporate Services, Hematology, Hepatology, Internal Medicine & Reumatology, Internal medicine and chest disease specialist', 'images/8J6CnEGT1APr0ExGtVtvuniNff4j0LxlbSvhuCko.jpg'),

    (5, 'BIRDEM General Hospital', '122 Kazi Nazrul Islam Ave, Dhaka 1000', 'Hepatology, Internal Medicine & Reumatology, Internal medicine and chest disease specialist', 'images/BIRDEM_Bangladesh.jpg')
";


if (mysqli_multi_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
