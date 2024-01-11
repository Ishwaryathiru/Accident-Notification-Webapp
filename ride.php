<!DOCTYPE html>
<html>


    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <title>NIKS-Safe Driving</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
        <link rel="stylesheet" href="ride.css">
    </head>
    <body>
   <div id="map"></div>
    <div class="buttons">
        <a class="click" href="ride.php"><button class="click"><img src="https://static.thenounproject.com/png/1154343-200.png"><br>ride</button></a>
        <a class="click" href="locate.php"><button class="click"><img src="https://icon-library.com/images/navigation-icon-png/navigation-icon-png-16.jpg"><br>locate</button></a>
        <button class="shield"><img src="https://cdn-icons-png.flaticon.com/512/709/709701.png"></button></a>
        <a class="click" href="user.php"><button class="click"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYRWjVT2Id5bG0YsYFDi8AGdLlu3KwKiolhmEr8yDmwg&s"><br>user</button></a>
        <a class="click" href="nearme.php"><button class="click"><img src="https://www.svgrepo.com/show/60463/add-user.svg"><br>near me</button></a>
    </div>
    <audio id="alertSound" src="alert.mp3" preload="autoplay"></audio>

    </body>
</html>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([9.9252, 78.1198], 13);

    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);
    if(!navigator.geolocation)
    {
        window.prompt("browser is not supported");
    }
    else
    {
        setInterval(() => {
            navigator.geolocation.getCurrentPosition(getPosition)
        },1500);
    }
    
    var marker,circle;
    function getPosition(position)
    {
        //console.log(postion)
        var lat = position.coords.latitude
        var long = position.coords.longitude
        // var lat=9.823619
        // var long=77.986565
        var accuracy = position.coords.accuracy
        if(marker)
        {
            map.removeLayer(marker)
            
        }
        if(circle)
        {
            map.removeLayer(circle)
        }
        marker = L.marker([lat,long]).addTo(map);
        console.log(lat,long,accuracy)
        checkLocationWithJson(lat, long);
    }

    var marker9 = L.circle([21.023403912637534, 79.04730238465791], {
  radius: 1500,
  color: 'red'
}).addTo(map);
var marker19 = L.circle([10.971271342365762, 77.03760299534699], {
  radius: 1500,
  color: 'red'
}).addTo(map);
var marker29 = L.circle([11.586379621448605, 78.69924845302508], {
  radius: 1500,
  color: 'red'
}).addTo(map);
var marker39 = L.circle([9.823619, 77.986565], {
  radius: 1500,
  color: 'red'
}).addTo(map);

    var alertSound = document.getElementById('alertSound');
    function checkLocationWithJson(lat, long) {
    console.log('Checking location with JSON:', lat, long);
    fetch('data1.json')
        .then(response => response.json())
        .then(data => {
            console.log('Data from JSON:', data);
            data.accident_prone_zones.forEach(zone => {
                console.log('Zone:', zone);
                if (lat === zone.lat && long === zone.lng) {
                    console.log('Accident-Prone Zone Detected!');
                    // Play the alert sound
                    alertSound.play();
                 
                    window.alert('Accident-Prone Zone Detected!');
    
                
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}
      
    
</script>
