<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <title>NIKS-Safe Driving</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="ride.css">
</head>
<body>
    <div id="map"></div>
    
    <div class="buttons">
        <a class="click" href="ride.php"><button class="click"><img src="https://static.thenounproject.com/png/1154343-200.png"><br>ride</button></a>
        <a class="click" href="locate.php"><button class="click"><img src="https://icon-library.com/images/navigation-icon-png/navigation-icon-png-16.jpg"><br>locate</button></a>
        <button class="shield"><img src="https://cdn-icons-png.flaticon.com/512/709/709701.png"></button></a>
        <a class="click" href="user.php"><button class="click"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYRWjVT2Id5bG0YsYFDi8AGdLlu3KwKiolhmEr8yDmwg&s"><br>user</button></a>
        <a class="click" href="locate.php"><button class="click"><img src="https://www.svgrepo.com/show/60463/add-user.svg"><br>near me</button></a>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script>
        var map = L.map('map').setView([9.9252, 78.1198], 13);

        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        osm.addTo(map);

        if (!navigator.geolocation) {
            window.prompt("browser is not supported");
        } else {
            setInterval(() => {
                navigator.geolocation.getCurrentPosition(getPosition);
            }, 1500);
        }

        var marker, circle;
        var instructionsSpoken = false;
        var routingControl;

        function getPosition(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            var accuracy = position.coords.accuracy;

            if (marker) {
                map.removeLayer(marker);
            }

            if (circle) {
                map.removeLayer(circle);
            }

            marker = L.marker([lat, long]).addTo(map);
            var currentDate = new Date();
            var currentHour = currentDate.getHours();
            if (currentHour < 24) {
                var marker7 = L.marker([9.882272412258839, 78.05651251203967], { alt: 'TKP' })
                    .addTo(map)
                    .bindPopup('RamPriya Hospital', { className: 'custom-popup' })
                    .on('click', function () {
                        // Activate routing control on marker click
                        L.Routing.control({
                            waypoints: [
                                L.latLng(position.coords.latitude, position.coords.longitude),
                                L.latLng(9.882272412258839, 78.05651251203967)
                            ]
                        })
                            .on('routeselected', function (e) {
                                var instructions = e.route.instructions.map(function (instruction) {
                                    return instruction.text;
                                }).join(', ');
                                speakRouteInstructions(instructions);
                            })
                            .addTo(map);
                    });
            }
            else { }
            if (currentHour < 24) {
            // Create and add the marker if the current time is before 12 PM
            var marker1 = L.marker([9.879152148027444, 78.06716440411289], { alt: 'TKP' })
                .addTo(map)
                .bindPopup('Government hospital Thirupurankundram')
                .on('click', function () {
                // Activate routing control on marker click
                L.Routing.control({
                    waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude),
                    L.latLng(9.879152148027444, 78.06716440411289)
                    ]
                })
                .on('routeselected', function (e) {
                                var instructions = e.route.instructions.map(function (instruction) {
                                    return instruction.text;
                                }).join(', ');
                                speakRouteInstructions(instructions);
                            }).addTo(map);
                });
            } else {
            // Do nothing or handle visibility as needed for times after 12 PM
            }
            if (currentHour < 23) {
            var marker3 = L.marker([9.883129377104364, 78.0723878270474],
            {alt: 'TKP'}).addTo(map) 
            .bindPopup('Vellamal Hospital')
            .on('click', function () {
                // Activate routing control on marker click
                L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude),
                    L.latLng(9.883129377104364, 78.0723878270474)
                ]
                })
                .on('routeselected', function (e) {
                                var instructions = e.route.instructions.map(function (instruction) {
                                    return instruction.text;
                                }).join(', ');
                                speakRouteInstructions(instructions);
                            })
                            .addTo(map);
            });
            }else{}
            if (currentHour < 18) {
            var marker4 = L.marker([9.87976572847321, 78.05728997589436],
            {alt: 'TKP'}).addTo(map) 
            .bindPopup('Gautam Hospital')
            .on('click', function () {
                // Activate routing control on marker click
                L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude),
                    L.latLng(9.87976572847321, 78.05728997589436)
                ]
                })
                .on('routeselected', function (e) {
                                var instructions = e.route.instructions.map(function (instruction) {
                                    return instruction.text;
                                }).join(', ');
                                speakRouteInstructions(instructions);
                            }).addTo(map);
            });
            }else{}
            if (currentHour < 19) {
            var marker5 = L.marker([9.881309198064061, 78.05727819613898],
            {alt: 'TKP'}).addTo(map) 
            .bindPopup('Manjari Hospital')
            .on('click', function () {
                // Activate routing control on marker click
                L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude),
                    L.latLng(9.881309198064061, 78.05727819613898)
                ]
                })
                .on('routeselected', function (e) {
                                var instructions = e.route.instructions.map(function (instruction) {
                                    return instruction.text;
                                }).join(', ');
                                speakRouteInstructions(instructions);
                            }).addTo(map);
            });
            }else{}
            if (currentHour < 20) {
            var marker6 = L.marker([9.880612896889627, 78.0610241583479],
            {alt: 'TKP'}).addTo(map) 
            .bindPopup('Aditiya Multi Speciality Hospital')
            .on('click', function () {
                // Activate routing control on marker click
                L.Routing.control({
                waypoints: [
                    L.latLng(position.coords.latitude, position.coords.longitude),
                    L.latLng(9.880612896889627, 78.0610241583479)
                ]
                })
                .on('routeselected', function (e) {
                                var instructions = e.route.instructions.map(function (instruction) {
                                    return instruction.text;
                                }).join(', ');
                                speakRouteInstructions(instructions);
                            }).addTo(map);
            });
            }else{}

            // Routing control setup
            routingControl = L.Routing.control({
                //routeWhileDragging: true
            })
            .on('routeselected', function (e) {
                if (!instructionsSpoken) {
                    var instructions = e.route.instructions.map(function (instruction) {
                        return instruction.text;
                    }).join(', ');
                    speakRouteInstructions(instructions);

                    // Set the flag to true after speaking instructions
                    instructionsSpoken = true;
                }
            })
            .addTo(map);
        }

        function speakRouteInstructions(instructions) {
    if (instructions.trim() !== '') {
        var utterance = new SpeechSynthesisUtterance(instructions);
        window.speechSynthesis.speak(utterance);
    }
}
    </script>
</body>
</html>
