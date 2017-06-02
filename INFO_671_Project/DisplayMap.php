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

        var image = {
            url: 'http://www.iconsdb.com/icons/preview/royal-blue/map-marker-2-xxl.png',
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(40, 40)
        };

        function initMap() {
          var pyrmont = {lat: 39.956756, lng: -75.1897052};

          var ul1 = {lat: 39.9566742, lng: -75.2001552};
          var ul2 = {lat: 39.95670, lng: -75.1996457};
          var ul3 = {lat: 39.956756, lng: -75.189};
          var ul4 = {lat: 39.9568713, lng: -75.1837};

          var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<div id="bodyContent">'+
            '<h2>Robert\'s clinic</h2>'
            '</div>'+
            '</div>';

          var infowindow = new google.maps.InfoWindow({
              content: contentString
          });

          map = new google.maps.Map(document.getElementById('map'), {
            center: pyrmont,
            zoom: 10
          });

         var marker1 = new google.maps.Marker({
          position: ul1,
          label:'1',
          map: map
         });

         marker1.addListener('click', function() {
              infowindow.open(map, marker1);
         });

         var marker2 = new google.maps.Marker({
          position: ul2,
          label:'2',
          map: map
         });

         var marker3 = new google.maps.Marker({
          position: ul3,
          label:'3',
          map: map
         });

         var marker4 = new google.maps.Marker({
          position: ul4,
          label:'4',
          map: map
         });
         
         var current = new google.maps.Marker({
          position: pyrmont,
          map: map,
          title:"Current Location",
          icon:image
         });
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
        <div class="container">
            <div class = "row">
                <div id="map">
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVBCYmr5045H4rYmjaKybJBcg10_vmVHc&libraries=places&callback=initMap" async defer></script>
                    <span class="pull-right">$42</span>
                </div>
                <div class="col-md-2"></div>
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

