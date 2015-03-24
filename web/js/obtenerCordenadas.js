var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('No se puede determinar una direcci&oacuten .');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
 
  document.getElementById('latitud').value = latLng.lat();
  document.getElementById('longitud').value = latLng.lng();
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

function initialize() {
  var latLng = new google.maps.LatLng(-34.9211737,-57.9541072);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 12,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });

  // updatea constantemente la ubicación.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);

  // eventos para escuchar el draggeo.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('seleccionando...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('seleccionando...');
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Ha seleccionado la ubicaci&oacuten');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);