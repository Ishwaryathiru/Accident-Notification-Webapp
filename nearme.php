<!DOCTYPE html>
<html >
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <title>NIKS-Safe Driving</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="ride.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="background">
    <!-- <div class="body"> -->
    <div class="bg">
        <div class="main">
            <div class="info-box">
                <center><div class="icon"><img src="https://www.svgrepo.com/show/60463/add-user.svg"></div></center>
                <?php 
                $dbuser = "root";
                $dbhost = "localhost";
                $dbpass = "";
                $dbname = "user_db";
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                $sql4 = "SELECT user_id, Vehicle_no, emergency_contacts FROM userdetails ";
                $retval4 = mysqli_query($conn, $sql4);

                while ($row = mysqli_fetch_assoc($retval4)) {
                    echo "<button class='contact-button' data-vehicle-no='" . $row["Vehicle_no"] . "'>" . $row["Vehicle_no"] . "</button>";
                    echo "<br><br>";
                }
                ?>
                <div id="contact-result"></div>
            </div>
            </div>
        </div>
    <div class="back">
        <a href="ride.php"><button class="back-button"></button></a>
    </div>
            <!-- </div> -->

    <script>
    $(document).ready(function () {
        // Click event for buttons with class 'contact-button'
        $('.contact-button').click(function () {
            var vehicleNo = $(this).data('vehicle-no');

            $.ajax({
                type: 'POST',
                url: 'get_user_data.php',
                data: { vehicle_no: vehicleNo },
                dataType: 'json', // Specify the expected data type
                success: function (response) {
                    var emergencyContacts = response.emergency_contacts;
                    var userName = response.user_name;

                    // Retrieve the location without the need for a separate button click
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var lat = position.coords.latitude;
                        var lon = position.coords.longitude;

                        // Send the latitude and longitude to the Python file
                        $.ajax({
                            type: 'POST',
                            url: 'http://127.0.0.1:5000/send_sms',
                            data: { 
                                emergency_contacts: emergencyContacts, 
                                user_name: userName,
                                lat: lat,
                                lon: lon,
                            },
                            success: function (response) {
                                console.log('Location sent successfully');
                            },
                            error: function () {
                                console.error('Error sending location');
                            }
                        });
                    });

                    // Display contact information
                    $('#contact-result').html('Emergency Contacts: ' + emergencyContacts + '<br>Username: ' + userName);
                }
            });
        });
    });
    </script>
</body>
</html>
