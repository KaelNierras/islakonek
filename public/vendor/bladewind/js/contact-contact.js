document.addEventListener('DOMContentLoaded', function() {
    console.log("Initializing map...");
    var map = L.map('map').setView([longitude, latitude], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    L.marker([longitude, latitude]).addTo(map);

    map.invalidateSize();

    saveProfile = () => {
        if (validateForm('.profile-form')) {
            showNotification('Added Successful', 'Your contact was added successfully');

            domEl('.profile-form').submit();

        } else {
            return false;
        }
    }

    updateProfile = () => {
        if (validateForm('.edit-form')) {
            showNotification('Upadted Successful', 'Your contact was updated successfully');
            domEl('.edit-form').submit();
        } else {
            return false;
        }
    }
});