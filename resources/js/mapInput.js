const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
    center: {lat: latitude, lng: longitude},
    zoom: 13
});
const marker = new google.maps.Marker({
map: map,
position: {lat: latitude, lng: longitude},
});