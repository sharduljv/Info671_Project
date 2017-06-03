<html>
    <head>
        
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    
    <style>
        #map {
          height: 85%;
          width: 85%;
        }
        
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVBCYmr5045H4rYmjaKybJBcg10_vmVHc&libraries=places"></script>
    <script>
        var map;
        var filters = {clinic:false, hospital:false, pharm:false};
        var gmarkers1 = [];
        var hospital_markers = [];
        var clinic_markers = [];
        var pharm_markers = [];
        var infowindow = new google.maps.InfoWindow({
            content: ''
        });

        // retrieve markers from database 

        var current_pin = {
            url: 'http://www.iconsdb.com/icons/preview/royal-blue/map-marker-2-xxl.png',
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(40, 40)
        };

        function addMarker(marker) {
            var cat = marker[4];
            var title = marker[1];
            var pos = new google.maps.LatLng(marker[2], marker[3]);
            var content = marker[1];
            marker1 = new google.maps.Marker({
              title: title,
              position: pos,
              category: category,
              map: map
            });
            gmarkers1.push(marker1);
        }

        function initMap() {
            var center = new google.maps.LatLng(39.9567472, -75.1896485);
            var mapOptions = {
              zoom: 12,
              center: center
            }

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            for (i = 0; i < markers1.length; i++){
              addMarker(markers1[i])
            }
        }

        filterMarkers = function(category) {
          for (i = 0; i < markers1.length; i++) {
            marker = gmarkers1[i];
            if (marker.category == category || category.length === 0) {
              marker.setVisible(true);
            }
            else {
              marker.setVisible(false);
            }
          }
        }       

    </script>
    
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Find a Clinic</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Hospital</a></li>
                <li><a href="#">Pharmaceutical</a></li>
                <li><a href="#">Specialist</a></li>
                </ul>
            </div>
        </nav>
            <div id="map">
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVBCYmr5045H4rYmjaKybJBcg10_vmVHc&libraries=places&callback=initMap" async defer></script>
            </div>
        </div>
    </body>
<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
</html>

