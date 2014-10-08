var map;
var marker;
var circle;
var geocoder;

function load() {
    geocoder = new google.maps.Geocoder();

    if ($("#field-latitude").val() != '' && $("#field-longitude").val() != '')
        var latlng = new google.maps.LatLng($("#field-latitude").val(), $("#field-longitude").val());
    else
        var latlng = new google.maps.LatLng(38.2509, -85.7643);
    var myOptions = {
        zoom: 18,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.SATELLITE
    };
    map = new google.maps.Map(document.getElementById("retailer-map"), myOptions);

    addMarker(map.getCenter());

    google.maps.event.addListener(map, "click", function(event) {
        addMarker(event.latLng);
    });

}

function codeAddress() {
    //var city = document.getElementById("field-city").value;
    var city = $("#field-city :selected").text();
    if (city == '') {
        city = document.getElementById("field-other_city").value;
    }
    var state = document.getElementById("field-state").value;
    if (state == '') {
        state = document.getElementById("field-other_state").value;
    }
    var country = document.getElementById("field-country").value;
    var address = document.getElementById("field-address1").value;
    var zip = document.getElementById("field-zip").value;
    if (zip.substr(3, 1) == ' ')
        zip = zip.substr(0, 3) + zip.substr(4);
    if (zip != '' || zip != 'Zip') {
        address += ' ' + zip;
    }
    address = address + ' ' + city + ' ' + zip + ' ' + state + ' ' + country;
    //console.log("Zip finding for " + zip);
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            addMarker(results[0].geometry.location);
        } else {
            console.log("Geocode was not successful for the following reason: " + status);
            //alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

function addMarker(location) {
    if (marker) {
        marker.setMap(null);
    }
    document.getElementById("field-latitude").value = location.lat();
    document.getElementById("field-longitude").value = location.lng();
    marker = new google.maps.Marker({
        position: location,
        draggable: true
    });
    marker.setMap(map);
    google.maps.event.addListener(marker, "dragend", function(event) {
        newlatlng = event.latLng;
        map.setCenter(newlatlng);
        document.getElementById("field-latitude").value = newlatlng.lat();
        document.getElementById("field-longitude").value = newlatlng.lng();
    });
}

window.onload = function() {
    load();
    $('#field-zip').blur(function() {
        codeAddress();
    });
    $('#field-zip').css('text-transform', 'uppercase');
}