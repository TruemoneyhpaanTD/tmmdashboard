<style>
.fg-mg {
  margin-bottom: 30px;
}

#map_wrapper {
    height: 450px;
}

#map_canvas {
    width: 100%;
    height: 100%;
}
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div id="map_wrapper" style="border:2px solid #a1a1a1; border-radius: 3px;">
    <div id="map_canvas" class="mapping"></div>
  </div>
</div>

<script>
    function initMap() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
          mapTypeId: 'roadmap'
        };
                      
        // Display a map on the page
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        map.setTilt(45);
          
        // Multiple Markers
        var markers = <?php echo json_encode($markers); ?>;
                          
        // Info Window Content
        var infoWindowContent = <?php echo json_encode($infos); ?>;
          
        // Display multiple markers on a map
        var infoWindow = new google.maps.InfoWindow(), marker, i;

        // Loop through our array of markers & place each one on the map  
        for( i = 0; i < markers.length; i++ ) {
          var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
          bounds.extend(position);
          marker = new google.maps.Marker({
              position: position,
              map: map,
              label: markers[i][0]
          });
          
          // Allow each marker to have an info window    
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                  infoWindow.setContent(infoWindowContent[i][0]);
                  infoWindow.open(map, marker);
              }
          })(marker, i));

          // Automatically center the map fitting all markers on the screen
          map.fitBounds(bounds);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
          // this.setZoom(8);
          google.maps.event.removeListener(boundsListener);
        });

    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries&callback=initMap">
</script>