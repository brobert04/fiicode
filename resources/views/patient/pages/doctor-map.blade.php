@extends('patient.template')
@section('title', 'Doctor Map');
@section('content')
    <div id="map" style="height:400px;"></div>
@endsection
@section('custom-js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var lat = 23.8103;
            var lng = 90.4125;
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: lat, lng: lng },
                zoom: 6,
            });

  
            var locations =  <?php print_r(json_encode($location)) ?>;
  
            let infowindow = new google.maps.InfoWindow();
            let window = new google.maps.InfoWindow();

            var marker, i;
              
            for (i = 0; i < locations.length; i++) {  
                  marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                    map: map
                  });
                    
                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      infowindow.setContent(locations[i]['name']);
                      infowindow.open(map, marker);
                    }
                  })(marker, i));
  
            }
            const locationButton = document.createElement("button");

            locationButton.textContent = "Find Current Loocation";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
            locationButton.addEventListener("click", () => {
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            window.setPosition(pos);
                            window.setContent("Location found.");
                            window.open(map);
                            map.setCenter(pos);
                        },
                        () => {
                            handleLocationError(true, window, map.getCenter());
                        }
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, window, map.getCenter());
                }
            });
            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
            );
            infoWindow.open(map);
        }
            window.initMap = initMap;
    }    
    </script>
@endsection

