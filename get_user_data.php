<?php
$dbuser = "root";
$dbhost = "localhost";
$dbpass = "";
$dbname = "user_db";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Get the vehicle_no from the AJAX request
$vehicleNo = $_POST['vehicle_no'];

// Retrieve the emergency_contacts and username for the given vehicle_no
$sql = "SELECT emergency_contacts, user_name FROM userdetails WHERE Vehicle_no = '$vehicleNo'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $emergencyContacts = $row['emergency_contacts'];
    $userName = $row['user_name'];

    // Return the result as JSON
    echo json_encode(['emergency_contacts' => $emergencyContacts, 'user_name' => $userName]);
} else {
    echo 'Error fetching emergency contacts and username';
}

mysqli_close($conn);
?>
