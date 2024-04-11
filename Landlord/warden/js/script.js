const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
    
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })
    
}


document.addEventListener("DOMContentLoaded", function () {
        const bigImage = document.querySelector('.big-image img');
        const smallImages = document.querySelectorAll('.small-images img');

        smallImages.forEach(function (smallImage) {
            smallImage.addEventListener('click', function () {
                bigImage.src = this.src;
            });
        });
    });




// Example landlord advertisements data
const landlordAdvertisements = [
    { id: 1, latitude: 40.7128, longitude: -74.0060, description: "Spacious apartment for rent" },
    { id: 2, latitude: 34.0522, longitude: -118.2437, description: "Cozy studio available" },
    // Add more advertisements here
  ];
  
  function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: { lat: 37.0902, lng: -95.7129 }, // Default center of the map (United States)
    });
  
    // Add markers for each advertisement
    landlordAdvertisements.forEach(advertisement => {
      new google.maps.Marker({
        position: { lat: advertisement.latitude, lng: advertisement.longitude },
        map,
        title: advertisement.description
      });
    });
  }



    // Selecting the approval and rejection buttons
const approveBtn = document.querySelector('.approve-btn');
const rejectBtn = document.querySelector('.reject-btn');

    // Adding click event listeners to the buttons
approveBtn.addEventListener('click', () => {
        // Perform actions to approve the advertisement
        console.log('Advertisement approved');
        // You can add further actions here, like sending a request to the server, updating UI, etc.
      });

rejectBtn.addEventListener('click', () => {
        // Perform actions to reject the advertisement
        console.log('Advertisement rejected');
        // You can add further actions here, like sending a request to the server, updating UI, etc.
    });

