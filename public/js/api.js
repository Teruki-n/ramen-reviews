/*global infoWindow*/
/*global navigator*/
/*global localStorage*/
/*global google*/


  //geolocation API
  const savedGeoPermission = localStorage.getItem('geoPermission');

  if (!savedGeoPermission && navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
          position => {
              const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
              };
              document.getElementById('lat').value = pos.lat;
              document.getElementById('lon').value = pos.lng;
              localStorage.setItem('geoPermission', 'granted');
          },
          () => {
              handleLocationError(true);
          }
      );
  } else {
      // Browser doesn't support Geolocation
      handleLocationError(false);
  }

  function handleLocationError(browserHasGeolocation){
      document.getElementById('error-message').innerHTML =
          browserHasGeolocation
              ? "エラー: Geolocation サービスに失敗しました。"
              : "エラー: お使いのブラウザはGeolocationをサポートしていません。"
  }

//Maps JavaScript API
function initMap() {
    var maps = document.querySelectorAll('.map');
    maps.forEach(function(mapElem) {
        var lat = parseFloat(mapElem.dataset.lat);
        var lng = parseFloat(mapElem.dataset.lng);
        var location = { lat: lat, lng: lng };
        var map = new google.maps.Map(mapElem, {
            zoom: 14,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    });
}








