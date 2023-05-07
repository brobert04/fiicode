@extends('patient.template')
@section('title', 'Doctor Map');
@section('content')
    <div class="card">
        <div id="map" style="height:700px;"></div>
    </div>
@endsection
@section('custom-js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var lat = 46.70624451427844;
            var lng = 1.5450684330912021;
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: lat, lng: lng },
                zoom: 13
            });
    
            var locations =  <?php print_r(json_encode($locations)) ?>;
  
            let infowindow = new google.maps.InfoWindow();
            let window = new google.maps.InfoWindow();
            var marker, i;
              
            for (i = 0; i < locations.length; i++) {  
                const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
                  marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                    map: map,
                    icon: image,
                  });
                    
                  google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      infowindow.setContent(
                        `<span style="color:red; font-weight:bold; font-size:15px;">Dr. ${locations[i]['doc_name']}</span>` + 
                        '<br>' +
                        `<span">${locations[i]['name']}</span>` + 
                        '<br>' +
                        `<span style="font-size:12px;"><a href="tel:${locations[i]['phone']}">${locations[i]['phone']}</a></span>` + 
                        '<br>' +
                        `<span style="font-size:12px;">No. of patients : ${locations[i]['patients']}</span>` + 
                        '<br>' +
                        '<a style="margin-top:5px;" href="{{ url('/chat') }}">Chat With Him</a>');
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
                            map.setZoom(15);
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

