<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body class="page_search">
<div id="page_box">
<?php include('inc/nav.php');?>
<div id="page">
  <?php include('inc/header.php');?>
  <div id="content">
    <?php include('inc/mapsearch.php');?>
  </div>
  <?php include('inc/footer.php');?>
</div> 
</div>
</body>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jpanelmenu.min.js"></script>
<script src="js/ui.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>

<script>
      var map;

      function initialize() {
        var mapOptions = {
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

        // Try HTML5 geolocation
        if(navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude,
                                             position.coords.longitude);

            var infowindow = new google.maps.InfoWindow({
              map: map,
              position: pos,
              content: 'Location found using HTML5.'
            });

            map.setCenter(pos);
          }, function() {
            handleNoGeolocation(true);
          });
        } else {
          // Browser doesn't support Geolocation
          handleNoGeolocation(false);
        }
      }

      var activeInfoWindow;

function createMarker(posn, title, html) {
    var marker = new google.maps.Marker({ position: posn, title: title, draggable: false });
    marker['infowindow'] = new google.maps.InfoWindow({ content: html });

    infoWindows.push(marker['infowindow']);
    google.maps.event.addListener(marker, "click", function () {
        if ( activeInfoWindow == this['infowindow'] ) {
            return;
        }
        if ( activeInfoWindow ) {
            activeInfoWindow.close();
        }

        this['infowindow'].open(map, this);
        activeInfoWindow = this['infowindow'];
    });
    return marker;
}

      function handleNoGeolocation(errorFlag) {
        if (errorFlag) {
          var content = 'Error: The Geolocation service failed.';
        } else {
          var content = 'Error: Your browser doesn\'t support geolocation.';
        }

        var options = {
          map: map,
          position: new google.maps.LatLng(60, 105),
          content: content
        };

        var infowindow = new google.maps.InfoWindow(options);
        map.setCenter(options.position);
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</html>