const map = L.map('map').setView([39.3937346, -9.1273556], 7);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

L.marker([39.55, -8.65]).addTo(map)
    .bindPopup('Portugal')
    .openPopup();