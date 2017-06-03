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
          height: 90%;
          width: 90%;

          position: fixed;
          left: 5%;
        }
        
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
        
        .myButton {
          -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
          -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
          box-shadow:inset 0px 1px 0px 0px #ffffff;
          background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffffff), color-stop(1, #f6f6f6));
          background:-moz-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
          background:-webkit-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
          background:-o-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
          background:-ms-linear-gradient(top, #ffffff 5%, #f6f6f6 100%);
          background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0);
          background-color:#ffffff;
          -moz-border-radius:6px;
          -webkit-border-radius:6px;
          border-radius:6px;
          border:1px solid #dcdcdc;
          display:inline-block;
          cursor:pointer;
          color:#666666;
          font-family:Arial;
          font-size:15px;
          font-weight:bold;
          padding:6px 24px;
          text-decoration:none;
          text-shadow:0px 1px 0px #ffffff;
          top:2%;
        }
        .myButton:hover {
          background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f6f6f6), color-stop(1, #ffffff));
          background:-moz-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
          background:-webkit-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
          background:-o-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
          background:-ms-linear-gradient(top, #f6f6f6 5%, #ffffff 100%);
          background:linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
          filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#ffffff',GradientType=0);
          background-color:#f6f6f6;
        }
        .myButton:active {
          position:relative;
          top:1px;
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
        var infowindow = new google.maps.InfoWindow({
            content: ''
        });

        var current_image = {
            url: 'http://www.iconsdb.com/icons/preview/royal-blue/map-marker-2-xxl.png',
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(40, 40)
        };

        var markers1 = [
          ['1', 'Hospital1', 39.9567, -75.1896, 'Hospital'],
          ['2', 'Hospital2', 39.9568, -75.1895, 'Hospital'],
          ['3', 'Pharmaceutical', 39.9569, -75.1894, 'Pharmaceutical'],
          ['4', 'Specialist', 39.9570, -75.1893, 'Specialist']
        ];

        // retrieve markers from database 

        function addMarker(marker) {
            var cat = marker[4];
            var title = marker[1];
            var pos = new google.maps.LatLng(marker[2], marker[3]);
            var content = marker[1]; 
            var label = marker[0];
            marker1 = new google.maps.Marker({
              title: title,
              position: pos,
              category: cat,
              map: map,
              label:label
            });
            gmarkers1.push(marker1);
        }

        function initMap() {
            var center = new google.maps.LatLng(39.9567472, -75.1896485);
            var mapOptions = {
              zoom: 18,
              center: center
            }

            map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var current = new google.maps.Marker({
              position: {lat: 39.9567472, lng: -75.1896485},
              map: map,
              icon: current_image
            });
            
            for (i = 0; i < markers1.length; i++){
              addMarker(markers1[i]);
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

        initMap(); 

    </script>
    
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Find a Clinic</a>
                </div>
                <ul class="nav navbar-nav">
                <li><button class="myButton" onclick="filterMarkers(this.value);" value="">Home</button></li>
                <li><button class="myButton" onclick="filterMarkers(this.value);" value="Hospital">Hospital</button></li>
                <li><button class="myButton" onclick="filterMarkers(this.value);" value="Pharmaceutical">Pharmaceutical</button></li>
                <li><button class="myButton" onclick="filterMarkers(this.value);" value="Specialist">Specialist</button></li>
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

