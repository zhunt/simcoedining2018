"use strict";


$("#address").after("<a href='#' id='geocode-link'>Geocode Address</a>");


// on success, process the geocode result
function processGeocodeResponse(response) {
    var json = JSON.parse(response);

    if (json.status = 'OK' && Array.isArray(json.results)) {
        var data = json.results;
        var address = data[0]['formatted_address'];
        var lat = data[0].geometry.location.lat;
        var lng = data[0].geometry.location.lng;
        $('#address').val(address);
        $('#geo-lat').val(lat);
        $('#geo-lng').val(lng);
    } else {
        alert(response);
    }
}

$("#geocode-link").on("click", function () {
    var gmapUrl = 'https://maps.googleapis.com/maps/api/geocode/json?&address=#ADDRESS#&key=' + window.googlemapKey;
    var address = $('#address').val();

    if (address) {
        var xhr = new XMLHttpRequest();

        xhr.onload = function () {
            // Process our return data
            if (xhr.status >= 200 && xhr.status < 300) {
                // What do when the request is successful
                console.log('success!', xhr);
                processGeocodeResponse(xhr.response);
            } else {
                // What do when the request fails
                console.log('The request failed!');
            }
        };

        gmapUrl = gmapUrl.replace(/#ADDRESS#/, address);
        xhr.open('GET', gmapUrl);
        xhr.send();
    } //console.log( $( this ).text() );

});