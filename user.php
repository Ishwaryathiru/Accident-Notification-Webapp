<!DOCTYPE html>
<html >
    <head>
            <meta name="viewport" content="width=device-width, user-scalable=no" />
            <title>NIKS-Safe Driving</title>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
            <link rel="stylesheet" href="ride.css">
        
    </head>
    <body class="background" >
        <!-- <div class="body"> -->
        <form id="registrationForm">
        <div class="bg">
        <div class="main">
           <div class="info-box">
            <center><div class="icon"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYRWjVT2Id5bG0YsYFDi8AGdLlu3KwKiolhmEr8yDmwg&s"></div></center>
              
            <div class="info">
                    <label>Name:</label>
                    <input class="info-bar" type="text" name="user">
                </div>
                <div class="info">
                    <label>Phone:</label>
                    <input class="info-bar" type="text" name="phone">
                </div>
                <div class="info">
                    <label>Emergency contacts:</label>
                    <input class="info-bar" type="text" name="Emergency">
                </div>
                <div class="info">
                    <label>Blood group :</label>
                    <input class="info-bar" type="text" name="grp">
                </div>
                <div class="info">
                    <label>Vehicle number:</label>
                    <input class="info-bar" type="text" name="vno">
                </div>
            </div>
        </div>
        </div>
        </form>
        <br>
        <br>
        <br>
        <br>
        <div class="back">
        <button type="submit" onclick="submitForm()" class="submit-button">SUBMIT</button></a>
    
            <a href="ride.php"><button class="back-button"></button></a>
        </div>
<!-- </div> -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function submitForm() {
            var formData = $('#registrationForm').serialize();

            $.ajax({
                type: 'POST',
                url: 'nirudb.php',
                data: formData,
                success: function (response) {
                    // Handle the response as needed
                    console.log(response);
                    alert('Record created successfully');
                },
                error: function () {
                    alert('Error submitting the form');
                }
            });
        }
    </script>

    </body>
</html>
