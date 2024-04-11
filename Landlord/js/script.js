function getLocation() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_location.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var locationData = JSON.parse(xhr.responseText);
            document.getElementById('location').value = locationData.city + ', ' + locationData.country;
        }
    };
    xhr.send();
}


// For location tracking

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var locationInput = document.getElementById("location");
    locationInput.value = "Latitude: " + latitude + ", Longitude: " + longitude;
}







