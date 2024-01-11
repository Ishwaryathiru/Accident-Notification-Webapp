<?php
// send_message.php

// Retrieve the contact number from the AJAX request
$contact = $_POST['contact'];

// Execute the Python script
$result = shell_exec("python send_sms.py " . escapeshellarg($contact));

// Return the result to the JavaScript
echo $result;
?>
