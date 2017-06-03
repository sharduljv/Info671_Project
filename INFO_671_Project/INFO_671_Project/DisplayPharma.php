<html>
    <head>
        
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            #map {
                height: 500px;
                width: 100%;
            }
        </style>
    </head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" >
    </script>
    
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Find a Clinic</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="DisplayMap.php">Home</a></li>
                    <li><a href="DisplayHosp.php">Hospital</a></li>
                    <li class="active"><a href="DisplayPharma.php">Pharmaceutical</a></li>
                    <li><a href="DisplayDoc.php">Specialist</a></li>
                <li><a href="login.php">Log Out</a></li>
                </ul>
            </div>
        </nav>
            <div id="map"></div>

            <script>

                var my_loc;
                var map;
                var service;
                var infowindow;
                var selectedPlace;

                var covered_hosps = {
                    coords: [{
                        lat: 39.9489145,
                        lng: -75.1939595
                    }, {
                        lat: 39.9575178,
                        lng: -75.16333659999998
                    }, {
                        lat: 39.9453939,
                        lng: -75.1555553
                    }, {
                        lat: 39.99990220000001,
                        lng: -75.2153313
                    }, {
                        lat: 39.95143300000001,
                        lng: -75.2153313
                    }]
                }

                function initialize() {
                    my_loc = new google.maps.LatLng(39.9624254, -75.2028256);

                    map = new google.maps.Map(document.getElementById('map'), {
                        center: my_loc,
                        zoom: 14
                    });

                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                                var pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };

                                my_loc = new google.maps.LatLng(pos.lat, pos.lng);
                                map.setCenter(pos);
                                geo_loc_set_callback();
                            },
                            function error() {
                                geo_loc_set_callback();
                            }
                        );
                    } else {
                        geo_loc_set_callback();
                    }

                }


                function geo_loc_set_callback() {
                    your_loc_img = {
                        url: 'your_location.jpg',
                        scaledSize: new google.maps.Size(40, 40), // scaled size
                        origin: new google.maps.Point(0, 0), // origin
                        anchor: new google.maps.Point(0, 0) // anchor
                    };

                    var marker = new google.maps.Marker({
                        position: {
                            lat: my_loc.lat(),
                            lng: my_loc.lng()
                        },
                        map: map,
                        icon: your_loc_img
                    });

                    var request = {
                        location: my_loc,
                        radius: '5000',
                        types: ['pharmacy'],
                        openNow: true
                    };

                    service = new google.maps.places.PlacesService(map);
                    infowindow = new google.maps.InfoWindow();
                    service.nearbySearch(request, callback);
                }


                function checkIfCovered(coords) {
                    var isCovered = false;
                    for (var i = 0; i < covered_hosps.coords.length; i++) {
                        if (coords.lat == covered_hosps.coords[i].lat && coords.lng == covered_hosps.coords[i].lng) {
                            isCovered = true;
                            break;
                        }
                    }
                    return isCovered;
                }

                function getDirections() {
                    debugger;

                    var directionsService = new google.maps.DirectionsService;
                    var directionsDisplay = new google.maps.DirectionsRenderer;
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: my_loc
                    });
                    directionsDisplay.setMap(map);

                    dest = new google.maps.LatLng(selectedPlace.geometry.location.lat(), selectedPlace.geometry.location.lng());

                    directionsService.route({
                        origin: my_loc,
                        destination: dest,
                        travelMode: 'DRIVING'
                    }, function(response, status) {
                        if (status === 'OK') {
                            directionsDisplay.setDirections(response);
                        } else {
                            window.alert('Directions request failed due to ' + status);
                        }
                    });
                    return false;
                }

                function createMarker(place) {
                    var coords = {
                        lat: place.geometry.location.lat(),
                        lng: place.geometry.location.lng()
                    }
                    var isCovered = checkIfCovered(coords);

                    var image;

                    if (isCovered) {
                        image = {
                            url: 'covered.jpg',
                            scaledSize: new google.maps.Size(60, 60), // scaled size
                            origin: new google.maps.Point(0, 0), // origin
                            anchor: new google.maps.Point(0, 0) // anchor
                        };
                    } else {
                        image = {
                            url: 'uncovered.jpg',
                            scaledSize: new google.maps.Size(40, 40), // scaled size
                            origin: new google.maps.Point(0, 0), // origin
                            anchor: new google.maps.Point(0, 0) // anchor
                        };
                    }

                    var marker = new google.maps.Marker({
                        position: coords,
                        map: map,
                        icon: image
                    });

                    google.maps.event.addListener(marker, 'mouseover', function() {
                        selectedPlace = place;
                        infowindow.setContent('<div><strong>' + place.name + '</strong><br /><a href="" class="directionsAnchor" onclick="return getDirections()">Get Directions</a></div>');
                        infowindow.open(map, this);
                    });
                }

                function callback(results, status) {

                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {
                            var place = results[i];
                            //console.log(place.name + "-> " + place.geometry.location.lat() + ", " + place.geometry.location.lat())
                            createMarker(place);
                        }
                    }
                }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6MsgMMEY87RakoP8LLOzG3a9_dL_FNx8&libraries=places&callback=initialize">
            </script>

    </body>
<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
</html>

